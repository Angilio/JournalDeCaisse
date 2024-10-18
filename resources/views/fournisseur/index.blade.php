@extends('layout.base')

@section('title', 'les Fournisseur')

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
            <div class="d-flex justify-content-end"><a class="btn btn-primary" href="{{ route('fourni.fournisseur.create') }}"><i class="fa-solid fa-plus"></i> Nouveau fournisseur</a></div>
        </div>
        <div id="fourniContainer">
            @foreach ($fournisseurs as $f)
                <div id="fournisseur" class="mt-5">
                    @if ($f->Image)
                        <img id="imgProfil" src="{{ $f->imageUrl() }}" alt="">
                    @else
                        <img id="imgProfil" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
                    @endif
                    <a href="{{ route('fourni.fournisseur.edit' ,  $f) }}" class="fw-bold">{{ $f->name }}</a>
                    {{ $f->Contact }}
                </div>
            @endforeach
        </div>
    </div>
@endsection