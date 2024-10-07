<?php

namespace App\Http\Controllers\Entre;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntreFormRequest;
use App\Models\CategoryEnter;
use App\Models\Entre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
        return view('entre.create',
        [
                'entre' => new Entre(),
                'categories' => CategoryEnter::all()
            ]);
    }

   
    public function store(Entre $entre, EntreFormRequest $Request)
    {
        dd($Request->validated());
        $entre->Montant = $Request->Montant;
        $entre->Description = $Request->Description;
        $entre->created_at = $Request->created_at;
        $entre->user_id = Auth::id();
        $entre->category_enter_id = $Request->category_enter_id;
        $entre->save();
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
