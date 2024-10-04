<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonnelRequest;
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
        return view('personel.index',
        [
            'caisse' => Personnel::all()
        ]
        );
    }

    
    public function store(CreatePersonnelRequest $request)
    {
        $personel = Personnel::create($request->validated());
        return redirect(route('personel.personel.index'));
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
