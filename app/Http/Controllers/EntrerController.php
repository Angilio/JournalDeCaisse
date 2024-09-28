<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntreFormRequest;
use App\Models\Caisse;
use App\Models\CategoryEnter;
use App\Models\Entrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrerController extends Controller
{
    public function index() {
        $categories = CategoryEnter::all(); // Récupérer toutes les catégories
        return view('operation.entre',
        [
                'caisse' => new Caisse(),
                'categories' => $categories
            ]);
    }
    public function store(Caisse $caisse, Request $request, EntreFormRequest $Request) {
        $caisse->Montant = $Request->Montant;
        $caisse->Description = $Request->Description;
        $caisse->created_at = $Request->created_at;
        $caisse->user_id = Auth::id();
        $caisse->category_enter_id = $request->category_enter_id;
        $caisse->save();   
    }
}
