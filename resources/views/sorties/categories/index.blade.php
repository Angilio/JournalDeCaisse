@extends('layout.base')

@section('title', 'Les categories')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>Listes des catégories de dépense</h4>
            <a href="{{ route('cate.category.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Nouvelle catégorie</a>
        </div>
        
        <table class=" mt-5 table table-striped">
        <thead>
            <tr>
                <td class="h4">Nom </td>
                <td class="h4 text-end">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('cate.category.edit', $category) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('cate.category.destroy', $category) }} }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
       
    </div>
@endsection