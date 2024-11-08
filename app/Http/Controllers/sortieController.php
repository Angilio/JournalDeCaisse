<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortieFormRequest;
use App\Models\Beneficiaire;
use App\Models\Caisse;
use App\Models\Category;
use App\Models\Entrer;
use App\Models\Personnel;
use App\Models\Sortie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
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
        $sold = $caisse->Sold;
        $totalMontant = 0;
        
        // Parcourir chaque ensemble de données et calculer le montant total
        foreach ($request->validated('date') as $index => $date) {
            $pu = $request->validated('Montant')[$index];
            $quantity = $request->validated('Quantity')[$index];
            $montant = $pu * $quantity;
    
            // Vérifier si le montant est inférieur au solde
            if ($montant <= $sold) {
                Sortie::create([
                    'date' => $date,
                    'Context' => $request->validated('Context')[$index],
                    'Quantity' => $quantity,
                    'Montant' => $montant,
                    'category_id' => $request->validated('category_id')[$index],
                    'beneficiaire_id' => $request->validated('beneficiaire_id')[$index],
                    'personnel_id' => $request->validated('personnel_id')[$index],
                    'user_id' => $userId,
                ]);
    
                // Ajouter le montant au total à soustraire du solde de la caisse
                $totalMontant += $montant;
            } else {
                // Si le montant est supérieur au solde, renvoyer une erreur
                return redirect()->back()->with('error', 'Sold insuffisant pour le montant de la ligne.');
            }
        }
    
        // Vérifier si le solde est suffisant pour déduire le montant total
        if ($caisse && $sold >= $totalMontant) {
            $caisse->Sold -= $totalMontant;
            $caisse->save();
    
            return to_route('sortie.sortie.index')->with('success', 'Entrées enregistrées avec succès');
        } else {
            return redirect()->back()->with('error', 'Sold insuffisant pour les montants totaux.');
        }
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
    $validatedData = array_map(function ($value) {
        return is_array($value) ? $value[0] : $value;
    }, $request->validated());

    $sortie->update($validatedData);

    return to_route('sortie.sortie.index')->with('success', 'Entrée modifiée avec succès');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sortie $sortie)
    {
        $sortie->delete();
        return to_route('sortie.sortie.index')->with('success', 'Entrée supprimée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function showList()
    {
        // Récupérer les entrées, ajouter une colonne 'type' et les convertir en collection
        $entrees = Entrer::selectRaw("MONTHNAME(date) as month, Montant, Description, date, 'Entrée' as type")
        ->orderBy('date', 'asc')
        ->get();

        // Récupérer les sorties, ajouter une colonne 'type' et les convertir en collection
        $sorties = Sortie::selectRaw("MONTHNAME(date) as month, Montant, Context, date, 'Sortie' as type")
            ->orderBy('date', 'asc')
            ->get();

        // Fusionner les deux collections et trier par date
        $transactions = $entrees->merge($sorties)->sortBy('date')->groupBy('month');

        // Passer la collection fusionnée et groupée à la vue
        return view('sorties.list', compact('transactions'));
    }
}
