@extends('layouts.base')

@section('title', 'Ajouter personnel')

@section('content')
    <div id="contenu" class="personel w-100 bg-light">
        <div class="d-flex justify-content-end">
            <button class="btn btn-danger">Annuler</button>
        </div>
        <h2 class="text-center p-2 text-dark"> Ajouter un personnel ! </h2>
        <div id="form" class="personel">
            <form method="post" class="p-20"  action="{{ route('personel.personel.store') }}" >
                @csrf
                @method('post')

                @if ( session()->has('error') )
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                <div class="file-input-wrapper d-flex justify-content-center gap-2">
                    <button class="file-input-button d-flex justify-content-center">
                        <i class="fas fa-camera"></i>
                    </button>
                    <div id="input">
                        <input type="file" class="file-input" accept=".jpg, .jpeg, .png" name="image"/>
                    </div>
                </div>
                <p class="file-text d-flex justify-content-center ">Insérer une image</p>
                

                <div id="nameAndFirstName">
                    <div class="form-group mb-4 w-80">
                        <input id="category" placeholder="Nom" type="text" class="form-control w-80" id="name" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <div class="form-group mb-4 w-80">
                        <input id="category" placeholder="Prénoms" type="text" class="form-control w-80" id="firstName" name="firstName" value="{{ old('firstName') }}" />
                        @error('firstName')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div id="nameAndFirstName">
                    <div class="form-group mb-4 w-80">
                        <input id="category" placeholder="Nom" type="text" class="form-control w-80" id="name" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <div class="form-group mb-4 w-80">
                        <input id="category" placeholder="Prénoms" type="text" class="form-control w-80" id="firstName" name="firstName" value="{{ old('firstName') }}" />
                        @error('firstName')
                            <div class="text mb-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3 w-80">
                    <button type="submit" class="btn btn-primary mt-2 w-80"><i class="fa-solid fa-plus"></i> Ajouter un personel</button>
                </div>
            </form>
        </div>
    </div>

@endsection