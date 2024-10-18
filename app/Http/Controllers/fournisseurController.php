<?php

namespace App\Http\Controllers;

use App\Http\Requests\FournisseurFormRequest;
use App\Models\Fournisseur;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class fournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fournisseur.index', [
            'fournisseurs' => Fournisseur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fournisseur.form', [
            'fournisseur' => new Fournisseur()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FournisseurFormRequest $request)
    {
        $fourn = Fournisseur::create($this->extractData(new Fournisseur(),$request));
        return to_route('fourni.fournisseur.index')->with('success', 'Fournisseur enregistré avec succès');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseur.form', [
            'fournisseur' => $fournisseur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FournisseurFormRequest $request, Fournisseur $fournisseur)
    {
        $fournisseur->update($this->extractData($fournisseur,$request));
        return to_route('fourni.fournisseur.index')->with('success', 'Fournisseur modifié avec succès');
    }

    private function extractData(Fournisseur $fournisseur, FournisseurFormRequest $request): array
    {
       $data =  $request->Validated();
       /** @var UploadedFile|null $image */
       $image = $request->Validated('Image');
       if ($image==null || $image->getError()) {
            return $data;
       }
       if ($fournisseur->Image) {
            Storage::disk('public')->delete($fournisseur->Image);
       }
       $data['Image'] = $image->store('blog', 'public');
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
