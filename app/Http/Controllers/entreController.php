<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntreFormRequest;
use App\Models\Caisse;
use App\Models\Category_enter;
use App\Models\Entrer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class entreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('entres.index', [
            'entres' => Entrer::orderBy('created_at', 'desc')->paginate(5),
            'categories' => Category_enter::pluck('name', 'id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = Category_enter::all();
        return view('entres.form', [
            'entre' => new Entrer(),
            'categories' => Category_enter::pluck('name', 'id')
        ]);
    }


    public function store(EntreFormRequest $request, Caisse $caisse)
    {
        $userId = Auth::id();
        //Entrer::create($request->validated());
        $entrer = Entrer::create([
            'Montant' => $request->validated('Montant'),
            'Description' => $request->validated('Description'),
            'category_enter_id'=> $request->validated('category_enter_id'),
            'user_id' => $userId,
            'date' => $request->validated('date')
        ]);

        $derniereLigne = Entrer::latest('id')->first()->Montant;
        $caisse = Caisse::first(); // ou bien `find($id)` si vous avez un ID spécifique

        if ($caisse) {
            $caisse->Sold += $derniereLigne;
            $caisse->save();
        } else {
            throw new Exception("Caisse introuvable.");
        }
        return to_route('entre.entre.index')->with('success', 'L\'Entrés modifiée avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrer $entre)
    {
        
        return view('entres.form', [
            'entre' => $entre,
            'categories' => Category_enter::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntreFormRequest $request, Entrer $entre)
    {
        $entre->update($request->validated());
        return to_route('entre.entre.index')->with('success', 'L\'Entrés modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrer $entre)
    {
        $entre->delete();
        return to_route('entre.entre.index')->with('success', 'L\'Entrés supprimée avec succès');
    }
}
