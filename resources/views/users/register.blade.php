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
                <h2 class="text-center p-2 text-dark"> Ajouter un utilisateur ! </h2>
                <div id="nameAndFirstName">
                    <div class="form-group w-80">
                        <input id="category" placeholder="Nom" type="text" class="form-control w-80" id="name" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <div class="form-group w-80">
                        <input id="category" placeholder="Prénoms" type="text" class="form-control w-80" id="firstName" name="firstName" value="{{ old('firstName') }}" />
                        @error('firstName')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group w-80">
                    <input id="category" placeholder="Nom d'utilisateur" type="text" class="form-control w-80" id="Pseudo" name="Pseudo" value="{{ old('Pseudo') }}" />
                    @error('Pseudo')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                

                <div class="form-group w-80">
                    <input id="category" placeholder="john@doe.fr" type="email" class="form-control w-80" id="email" name="email" value="{{ old('email') }}" />
                </div>
                @error('email')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group w-80">
                    <input id="category" placeholder="Mot de passe" type="password" class="form-control w-80" id="password" name="password"/>
                </div>
                @error('password')
                    <div class="text mb-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="d-flex justify-content-center mt-5 w-80">
                    <button type="submit" class="btn btn-primary mt-2 w-80">Ajouter utilisateur</button>
                </div>
            </form>
        </div>
    </div>

@endsection