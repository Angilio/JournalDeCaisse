@extends('layouts.app')

@section('title', 'Login')
@section('content')
    <div id="login">
        @if ( session()->has('error') )
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @if ( session()->has('success') )
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <h2 class="text-center p-2 text-dark"> Bienvenue ! </h2>
        <p class="text-center pb-2 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <form method="post" id="form" class="form" action="{{ route('login') }}" >
            @csrf
            @method('post')
            <div class="m-4 w-80 p-1" >
                <input style="border: none; border-bottom:solid black 2px; border-radius: 0; background-color:transparent;" type="email" class="form-control" placeholder="john@doe.fr" name="email" value="{{ old('email') }}" />
                @error('email')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-group w-80 m-4 p-1">
                <input style="border: none; border-bottom:solid black 2px; border-radius: 0; background-color:transparent;" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" name="password"/>
                <div id="passwordHelpBlock" class="form-text">
                    @error('password')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="d-flex justify-content-center w-40 mb-2">
                <button type="submit" class="btn btn-primary m-2 ">Connexion</button>
            </div>
        </form>
    </div>
@endsection