@extends('layouts.base')

@section('title', 'Liste des opérations')

@section('content')
    <div id="contenu" class="bg-light w-100">
        <div id="listBtn">
            <div></div>
            <div id="twoFirst" class="d-flex justify-content-center">
                <a href="" class="btn btn-primary">Entrées</a>
                <a href="" class="btn btn-danger">Sorties</a>
            </div>
            <div class="d-flex justify-content-end"><a href="" class="btn btn-primary">Liste des opérations</a></div>
        </div>
        <form action="{{ route( 'operation.store') }}" method="post" id="form" class="vstack gap-2 w-100">
            @csrf
            @method('post')

            <div class="row">
                @include('shared.input' , ['placeholder' => 'Date','class' => 'col', 'name'=> 'created_at', 'value'=> $caisse->created_at])
                <div class="col row">
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'Description', 'value'=>$caisse->Description])
                    @include('shared.input' , ['type' => 'number','class' => 'col', 'name'=> 'Montant', 'value'=> $caisse->Montant])   
                </div>
            </div>

            <!-- Champ Select Blade -->
            <div class="form-group">
                <select selected id="category" name="category_enter_id" class="form-control mt-3" >
                    <option value="">Sélectionnez une categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <a href="" class="mt-5 btn btn-primary">Ajouter une ligne</a>

            <div id="grpBtn" class="mt-2">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection