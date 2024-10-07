<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntreFormRequest;
use App\Models\CategoryEnter;
use App\Models\Entre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrerController extends Controller
{
    public function index()
    {
        return view('entre.index',
        [
                'entre' => Entre::all()
            ]);
    }

   
    public function create()
    {
        $entre = new Entre();
        return view('entre.create',
        [
                'categories' => CategoryEnter::all()
            ]);
    }

   
    public function store(EntreFormRequest $Request): void
    {
        $entrer =$Request->validate([
            'Montant' => ['required', 'numeric'],
            'created_at' => ['required', 'date'],
            'Description' => ['required'],
            'category_enter_id' => ['required', 'exists:category_enters,id'],
            'User_id' => ['required', 'exists:users,id']
        ]);
        Entre::create($entrer);
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
