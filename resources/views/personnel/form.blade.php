@extends('layout.base')

@section('title', $personnel->exists ? 'Modifier un personnel' : 'Ajouter un personnel')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        <div class="d-flex justify-content-between">
            <h3 class="h4">
                    @if ($personnel->exists)
                        Modifier ce personnel
                    @else
                        Ajouter un nouveau personnel
                    @endif
            </h3>
            <a href="{{ route('fourni.fournisseur.index') }}" class="btn btn-primary">Voir les catéries existant</a>
        </div>
        <div id="formulaire">
            <form class="p-5 w-50" id="form" action="{{ route($personnel->exists ? 'perso.personnel.update' : 'perso.personnel.store', $personnel ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($personnel->exists ? 'put' : 'post')

                <div class="form-group d-flex flex-column justify-content-center align-items-center">
                    <!-- Label agissant comme le champ de téléchargement -->
                    <label for="file-input" class="file-label">
                        <i class="fas fa-camera"></i> <!-- Icône de l'appareil photo (ex : FontAwesome) -->
                        <input type="file" id="file-input" class="form-control d-none @error('Image') is-invalid @enderror" name="Image" accept=".png, .jpeg, .jpg">
                    </label>

                    <!-- Texte en dessous du champ de téléchargement -->
                    <p class="file-text">Choisir une image</p>

                    @error('Image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mt-4">
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'name', 'value'=>$personnel->name]) 
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'firstName', 'value'=>$personnel->firstName]) 
                </div>
                <div class="row mt-4">
                    @include('shared.input' , ['type' => 'number','class' => 'col', 'name'=> 'Contact', 'value'=> $personnel->Contact]) 
                    @include('shared.input' , ['type' => 'email','class' => 'col', 'name'=> 'email', 'value'=> $personnel->email]) 
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary">
                        @if ($personnel->exists)
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