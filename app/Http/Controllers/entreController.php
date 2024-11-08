<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntreFormRequest;
use App\Models\Caisse;
use App\Models\Category_enter;
use App\Models\Entrer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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


    public function store(EntreFormRequest $request)
    {
        $userId = Auth::id();
        $currentMonth = now()->startOfMonth(); // Date de début du mois actuel
    
        // Vérifiez si une ligne de caisse existe pour le mois en cours
        $caisse = Caisse::where('created_at', '>=', $currentMonth)
                        ->where('created_at', '<', $currentMonth->copy()->addMonth())
                        ->first();
    
        if (!$caisse) {
            // Récupérez le dernier solde du mois précédent s'il existe
            $lastCaisse = Caisse::orderBy('created_at', 'desc')->first();
            $lastSold = $lastCaisse ? $lastCaisse->Sold : 0;
            dd($lastSold);
            // Créez une nouvelle ligne pour le mois courant avec le solde précédent comme solde initial
            $caisse = Caisse::create([
                'Sold' => $lastSold , // Utilisez le solde du mois précédent
                'created_at' => now(), // Date actuelle pour la nouvelle ligne
            ]);
        }
    
        // Créez l'enregistrement dans `Entrer`
        $entrer = Entrer::create([
            'Montant' => $request->validated('Montant'),
            'Description' => $request->validated('Description'),
            'category_enter_id' => $request->validated('category_enter_id'),
            'user_id' => $userId,
            'date' => $request->validated('date')
        ]);
    
        // Récupérez le montant de l'entrée et mettez à jour le solde de la caisse
        $montant = $entrer->Montant;
        $caisse->Sold += $montant;
        $caisse->save();
    
        return to_route('entre.entre.index')->with('success', 'Entrée enregistrée avec succès');
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
