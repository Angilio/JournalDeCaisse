@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div id="register">
        <div id="form">
            <form method="post"  action="{{ route('registration') }}" autocomplete="off">
                @csrf
                @method('post')

                @if ( session()->has('error') )
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                <h2 class="text-center p-2 text-primary"> Créer un compte ! </h2>
                <div id="nameAndFirstName">
                    <div class="form-group w-80">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control w-80" id="name" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <div class="form-group w-80">
                        <label for="firstName">Prénoms :</label>
                        <input type="text" class="form-control w-80" id="firstName" name="firstName" value="{{ old('firstName') }}" />
                        @error('firstName')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group w-80">
                    <label for="Pseudo">Nom d'utilisateur :</label>
                    <input type="text" class="form-control w-80" id="Pseudo" name="Pseudo" value="{{ old('Pseudo') }}" />
                </div>
                @error('Pseudo')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group w-80">
                    <label for="email">Votre e-mail :</label>
                    <input type="email" class="form-control w-80" id="email" name="email" value="{{ old('email') }}" />
                </div>
                @error('email')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group w-80">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control w-80" id="password" name="password"/>
                </div>
                @error('password')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary mt-2 w-80">Inscription</button>

                <div class="mt-2">
                    Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
                </div>
            </form>
        </div>
    </div>

@endsection