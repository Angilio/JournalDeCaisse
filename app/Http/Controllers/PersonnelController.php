<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    
    public function index()
    {
        return view('personel.all',[
            'personnels' => Personnel::all()
        ]);
    }

    
    public function create()
    {
        return view('personel.index');
    }

    
    public function store(Request $request)
    {
        //
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
