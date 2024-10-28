@extends('layout.base')

@section('title', $sortie->exists ? 'Modifier un sortie' : 'Ajouter un sortie')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-end">
            <a href="{{ route('sortie.sortie.index') }}" class="btn btn-primary">Liste des sorties</a>
        </div>
            <form class="p-5" id="form" action="{{ route($sortie->exists ? 'sortie.sortie.update' : 'sortie.sortie.store', $sortie) }}" method="post">
                @csrf
                @method($sortie->exists ? 'put' : 'post')

                <div class="row mt-4">
                    @include('shared.date', [
                        'type' => 'date', 
                        'placeholder' => 'Date :', // Définition du placeholder ici
                        'class' => 'col', 
                        'name'=> 'date', 
                        'value' => $sortie->date   //Prend en compte une valeur ou null
                    ])
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'Context', 'value'=>$sortie->Context]) 
                    @include('shared.input' , ['type' => 'number', 'placeholder' => 'Quantité','class' => 'col', 'name'=> 'Quantity', 'value'=> $sortie->Quantity])
                    @include('shared.input' , ['type' => 'number','placeholder' => 'Prix Unitaire','class' => 'col', 'name'=> 'Montant', 'value'=> $sortie->Montant]) 
                </div>

                <div class="mt-4 row">
                    @include('shared.selectsortie' , ['class' => 'col w-100','name'=> 'category', 'value'=> $sortie->Category()->pluck('id')])
                    @include('shared.selectbene' , ['class' => 'col w-100','name'=> 'beneficiaire_id', 'value'=> $sortie->Beneficiaire()->pluck('id')])
                    @include('shared.selectperso' , ['class' => 'col w-100','name'=> 'personnel_id', 'value'=> $sortie->Personnel()->pluck('id')])
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        @if ($sortie->exists)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button>
                </div>
            </form>       
    </div>
@endsection