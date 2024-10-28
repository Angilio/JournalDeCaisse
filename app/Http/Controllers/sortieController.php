<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortieFormRequest;
use App\Models\Beneficiaire;
use App\Models\Caisse;
use App\Models\Category;
use App\Models\Personnel;
use App\Models\Sortie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sortieController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sorties.index', [
            'sorties' => Sortie::orderBy('created_at', 'desc')->paginate(5),
            'categories' => Category::pluck('name', 'id'),
            'personnels' => Personnel::pluck('name', 'id'),
            'beneficiaires' => Beneficiaire::pluck('name', 'id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = Category::all();
        return view('sorties.form', [
            'sortie' => new Sortie(),
            'categories' => Category::pluck('name', 'id'),
            'personnels' => Personnel::pluck('firstName', 'id'),
            'beneficiaires' => Beneficiaire::pluck('name', 'id')
        ]);
    }


    public function store(SortieFormRequest $request, Caisse $caisse)
    {
        $caisse = Caisse::first();
        $userId = Auth::id();
        //Sortie::create($request->validated());
        $sold = $caisse->Sold;
        $pu = $request->validated('Montant');
        $montant = $pu * $request->validated('Quantity');
        if ($montant < $sold) {
            Sortie::create([
                'Montant' => $montant,
                'Context' => $request->validated('Context'),
                'category_id'=> $request->validated('category_id'),
                'personnel_id'=> $request->validated('personnel_id'),
                'beneficiaire_id'=> $request->validated('beneficiaire_id'),
                'user_id' => $userId,
                'date' => $request->validated('date'),
                'Quantity'=> $request->validated('Quantity')
            ]);
        }

        $derniereLigne = Sortie::latest('id')->first()->Montant;

        if ($caisse && $caisse->Sold > $derniereLigne) {
            $caisse->Sold -= $derniereLigne;
            $caisse->save();
        } else {
            return redirect()->back()->with('error', 'Sold insuffisant.');
        }
        return to_route('sortie.sortie.index')->with('success', 'L\'Entrés modifiée avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sortie $sortie) 
    {
        
        return view('sorties.form', [
            'sortie' => $sortie,
            'categories' => Category::pluck('name', 'id'),
            'personnels' => Personnel::pluck('name', 'id'),
            'beneficiaires' => Beneficiaire::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SortieFormRequest $request, Sortie $sortie)
    {
        $sortie->update($request->validated());
        return to_route('sortie.sortie.index')->with('success', 'L\'Entrés modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sortie $sortie)
    {
        $sortie->delete();
        return to_route('sortie.sortie.index')->with('success', 'L\'Entrés supprimée avec succès');
    }
}
