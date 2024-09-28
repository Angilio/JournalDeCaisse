@extends('layouts.base')

@section('title', 'Liste des opérations')

@section('content')
    <div id="contenu" class="bg-light w-100">
        <div>

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
                    <option value="">Selectionnez une categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="grpBtn" class="mt-5">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection