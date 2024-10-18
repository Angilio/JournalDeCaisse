<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelFormRequest;
use App\Models\Personnel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class personnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('personnel.index', [
            'personnels' => Personnel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personnel.form', [
            'personnel' => new Personnel()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonnelFormRequest $request)
    {
        $fourn = Personnel::create($this->extractData(new Personnel(),$request));
        return to_route('perso.personnel.index')->with('success', 'Personnel enregistré avec succès');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        return view('personnel.form', [
            'personnel' => $personnel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonnelFormRequest $request, Personnel $personnel)
    {
        $personnel->update($this->extractData($personnel,$request));
        return to_route('perso.personnel.index')->with('success', 'Personnel modifié avec succès');
    }

    private function extractData(Personnel $personnel, PersonnelFormRequest $request): array
    {
       $data =  $request->Validated();
       /** @var UploadedFile|null $image */
       $image = $request->Validated('Image');
       if ($image==null || $image->getError()) {
            return $data;
       }
       if ($personnel->Image) {
            Storage::disk('public')->delete($personnel->Image);
       }
       $data['Image'] = $image->store('perso', 'public');
       return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
