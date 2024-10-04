@extends('layouts.base')
@section('title', 'Les personels')
@section('content')
    <div id="contenu" class="personel w-100 bg-light">
        <div id="listBtn">
            <div></div>
            <div id="twoFirst" class="d-flex justify-content-center">
                <a href="" class="btn btn-primary">Employés</a>
                <a href="" class="btn btn-danger">Fournisseur</a>
            </div>
            <div class="d-flex justify-content-end"><a href="{{ route('personel.personel.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nouveau Employé</a></div>
        </div>
        <div id="personnalContainer">
            @foreach ($personnels as $personnel)
                <div id="card" class="mb-5">
                    <img id="imgPerso" src="{{ asset('/assets/images/pdp.jpeg') }}" alt="">
                    <p class="text-info fw-bold"><a href="">{{ $personnel->name . ' ' . $personnel->firstName }}</a></p>
                    <p>{{ $personnel->Contact }}</p>
                    <p>{{ $personnel->email }}</p>
                </div>
            @endforeach
        </div>

        
    </div>
@endsection