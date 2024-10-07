@extends('layouts.base')

@section('title', $entre->exists ? 'Editer une entrée' : 'Aouter une entrée')


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
        <form action="{{ route($entre->exists ? 'entre.entres.update' : 'entre.entres.store', $entre) }}" method="post" id="form" class="vstack gap-2 w-100">
            @csrf
            @method($entre->exists ? 'put' : 'post')

            <div class="row">
                @include('shared.input' , ['type' => 'date','placeholder' => 'Date','class' => 'col', 'name'=> 'created_at', 'value'=> $entre->created_at])
                <div class="col row">
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'Description', 'value'=>$entre->Description])
                    @include('shared.input' , ['type' => 'number','class' => 'col', 'name'=> 'Montant', 'value'=> $entre->Montant])   
                </div>
            </div>

            <div class="form-group">
                <select selected id="category" name="category_enter_id" class="form-control mt-3 @error('category_enter_id') is-invalid @enderror" >
                    <option value="">Sélectionnez une categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_enter_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div id="grpBtn" class="mt-2">
                <button class="btn btn-primary"> 
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