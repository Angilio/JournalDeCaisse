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
        return view('operation.index',
        [
                'caisse' => Caisse::all()
            ]);
    }
    public function create() {
        return view('operation.entre',
        [
                'caisse' => new Caisse(),
                'categories' => CategoryEnter::all()
            ]);
    }
    public function store(Caisse $caisse, EntreFormRequest $Request) {
        $caisse->Montant = $Request->Montant;
        $caisse->Description = $Request->Description;
        $caisse->created_at = $Request->created_at;
        $caisse->user_id = Auth::id();
        $caisse->category_enter_id = $Request->category_enter_id;
        $caisse->save();
        return to_route('operation.index');  
    }

    public function edit(Caisse $caisse)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($caisse)
    {
        
    }
}
