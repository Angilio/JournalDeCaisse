@extends('layout.base')

@section('title', $fournisseur->exists ? 'Modifier un fournisseur' : 'Ajouter un fournisseur')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        <div class="d-flex justify-content-between">
            <h3 class="h4">
                    @if ($fournisseur->exists)
                        Modifier ce fournisseur
                    @else
                        Ajouter un nouveau fournisseur
                    @endif
            </h3>
            <a href="{{ route('fourni.fournisseur.index') }}" class="btn btn-primary">Voir les catéries existant</a>
        </div>
        <div id="formulaire">
            <form class="p-5 w-50" id="form" action="{{ route($fournisseur->exists ? 'fourni.fournisseur.update' : 'fourni.fournisseur.store', $fournisseur ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($fournisseur->exists ? 'put' : 'post')

                
                <!-- Conteneur pour le champ de téléchargement -->
                <div class="form-group d-flex justify-content-center">
                    <!-- Label agissant comme le champ de téléchargement -->
                    <label for="file-input" class="file-label">
                        <i class="fas fa-camera"></i> <!-- Icône de l'appareil photo (ex : FontAwesome) -->
                        <input type="file" id="file-input" class="form-control d-none @error('Image') is-invalid @enderror" name="Image" accept=".png, .jpeg, .jpg">
                    </label>

                    @error('Image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'name', 'value'=>$fournisseur->name])  
                </div>
                <div class="mt-4">
                    @include('shared.input' , ['type' => 'number','class' => 'col', 'name'=> 'Contact', 'value'=> $fournisseur->Contact]) 
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary">
                        @if ($fournisseur->exists)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button>
                </div>

            </form>
        </div>
        
    </div>
@endsection