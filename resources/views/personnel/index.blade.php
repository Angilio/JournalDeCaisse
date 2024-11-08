@extends('layout.base')

@section('title', 'Les Personnels')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="listBtn">
            <div></div>
            <div id="twoFirst" class="d-flex justify-content-center">
                <a href="{{ route('perso.personnel.index') }}" class="btn btn-primary">Employés</a>
                <a href="{{ route('fourni.fournisseur.index') }}" class="btn btn-danger">Fournisseur</a>
            </div>
            <div class="d-flex justify-content-end"><a class="btn btn-primary" href="{{ route('perso.personnel.create') }}"><i class="fa-solid fa-plus"></i> Nouveau employé</a></div>
        </div>
        <div id="fourniContainer">
            @foreach ($personnels as $p)
                <div id="personnel" class="mt-5">
                    @if ($p->Image)
                        <img id="imgProfil" src="{{ $p->imageUrl() }}" alt="">
                    @else
                        <img id="imgProfil" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
                    @endif
                    <a href="{{ route('perso.personnel.edit' ,  $p) }}" class="fw-bold">{{ $p->name . ' ' . $p->firstName}}</a>
                    <p>{{ $p->Contact }} </p>
                    <p>{{ $p->email }} </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection