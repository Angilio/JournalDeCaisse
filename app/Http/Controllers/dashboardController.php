<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Entrer;
use App\Models\Sortie;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Données mensuelles existantes
    $sold = array_fill(0, 12, 0);
    $entrees = array_fill(0, 12, 0);
    $sorties = array_fill(0, 12, 0);

    // Récupérer les données mensuelles de la base de données
    $soldData = Caisse::selectRaw("MONTH(created_at) as month, SUM(Sold) as total")
                      ->groupBy('month')
                      ->orderBy('month')
                      ->pluck('total', 'month');

    $entreesData = Entrer::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                          ->groupBy('month')
                          ->orderBy('month')
                          ->pluck('total', 'month');

    $sortiesData = Sortie::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                          ->groupBy('month')
                          ->orderBy('month')
                          ->pluck('total', 'month');

    foreach ($soldData as $month => $total) {
        $sold[$month - 1] = $total;
    }
    foreach ($entreesData as $month => $total) {
        $entrees[$month - 1] = $total;
    }
    foreach ($sortiesData as $month => $total) {
        $sorties[$month - 1] = $total;
    }

    // Récupérer les données de sortie par catégories
    $sortiesParCategorie = Sortie::selectRaw('categories.name as category, SUM(montant) as total')
                                  ->join('categories', 'sorties.category_id', '=', 'categories.id')
                                  ->groupBy('categories.name')
                                  ->pluck('total', 'category');

    // Passer les données à la vue
    $caisse = Caisse::first();
    return view('dashboard', [
        'soldData' => $sold,
        'entreesData' => $entrees,
        'sortiesData' => $sorties,
        'caisse' => $caisse,
        'entre' => Entrer::sum('Montant'),
        'sortie' => Sortie::sum('Montant'),
        'sortiesParCategorie' => $sortiesParCategorie // Nouvelle variable
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
