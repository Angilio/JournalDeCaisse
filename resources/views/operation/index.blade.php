@extends('layouts.base')
@section('title', 'Les Operation')
@section('content')
    <div id="contenu" class="personel w-100 bg-light">
        <div id="listBtn">
            <div></div>
            <div id="twoFirst" class="d-flex justify-content-center">
                <a href="" class="btn btn-warning"><i class="fa-solid fa-link"></i></a>
                <a href="" class="btn btn-primary">Entrées</a>
                <a href="" class="btn btn-danger">Sorties</a>
            </div>
            <div class="d-flex justify-content-end"><a href="{{ route('operation.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nouvelle opération</a></div>
        </div>
        <div class="mt-5 p-4" id="form">
            <table class="table table-stripted">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Somme</th>
                        <th  class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caisse as $c)
                        <tr>
                            <td>{{ $c->Description }}</td>
                            <td>{{ $c->category_enter_id }}</td>
                            <td>{{ $c->created_at }}</td>
                            <td>{{ $c->Montant }}</td>
                            <td class="text-end">
                                <a href=""><i class=" text-info fa-solid fa-pen-to-square"></i></a>
                                <a href=""><i class="text-danger fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection