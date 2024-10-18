@extends('layout.base')

@section('title', $category->exists ? 'Modifier une categorie' : 'Ajouter un categorie')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        <div class="d-flex justify-content-between">
            <h3 class="h4">
                    @if ($category->exists)
                        Modifier la catégorie
                    @else
                        Ajouter une nouvelle catégorie
                    @endif
            </h3>
            <a href="{{ route('cate.category.index') }}" class="btn btn-primary">Voir les catéries existant</a>
        </div>
        <div id="formulaire">
            <form class="p-5 w-50" id="form" action="{{ route($category->exists ? 'cate.category.update' : 'cate.category.store', $category ) }}" method="post">
                @csrf
                @method($category->exists ? 'put' : 'post')

                <div>
                    @include('shared.input' , ['type' => 'text','class' => ' col', 'name'=> 'name', 'value'=>$category->name])  
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary">
                        @if ($category->exists)
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