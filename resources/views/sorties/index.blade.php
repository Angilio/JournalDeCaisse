@extends('layout.base')

@section('title', 'Les Personnels')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        
        @endif
       
    </div>
@endsection