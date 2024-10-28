@extends('layout.base')

@section('title', $entre->exists ? 'Modifier un entre' : 'Ajouter un entre')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
       
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-end">
            <a href="{{ route('entre.entre.index') }}" class="btn btn-primary">Liste des entres</a>
        </div>
            <form class="p-5" id="form" action="{{ route($entre->exists ? 'entre.entre.update' : 'entre.entre.store', $entre) }}" method="post">
                @csrf
                @method($entre->exists ? 'put' : 'post')

                <div class="row mt-4">
                    @include('shared.date', [
                        'type' => 'date', 
                        'placeholder' => 'Date :', // Définition du placeholder ici
                        'class' => 'col', 
                        'name'=> 'date', 
                        'value' => $entre->date   //Prend en compte une valeur ou null
                    ])

                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'Description', 'value'=>$entre->Description]) 
                    @include('shared.input' , ['type' => 'number','class' => 'col', 'name'=> 'Montant', 'value'=> $entre->Montant]) 
                </div>

                <div class="mt-4">
                    @include('shared.select' , ['class' => 'col','name'=> 'category_enter_id', 'value'=> $entre->Category_Enter()->pluck('id')])
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        @if ($entre->exists)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button>
                </div>
            </form>       
    </div>
@endsection