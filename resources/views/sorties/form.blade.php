@extends('layout.base')

@section('title', $sortie->exists ? 'Modifier un sortie' : 'Ajouter un sortie')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-end">
            <a href="{{ route('sortie.sortie.index') }}" class="btn btn-primary">Liste des sorties</a>
        </div>
            <form class="p-5" id="form" action="{{ route($sortie->exists ? 'sortie.sortie.update' : 'sortie.sortie.store', $sortie) }}" method="post">
                @csrf
                @method($sortie->exists ? 'put' : 'post')

                <div id="form-entries">
                    <div class="entry mt-4">
                        <div class="row">
                            @include('shared.date', [
                                'type' => 'date', 
                                'placeholder' => 'Date :', // Définition du placeholder ici
                                'class' => 'col', 
                                'name'=> 'date[]', 
                                'value' => $sortie->date   //Prend en compte une valeur ou null
                            ])
                            @include('shared.input' , ['type' => 'text','placeholder' => 'Description','class' => ' col', 'name'=> 'Context[]', 'value'=>$sortie->Context]) 
                            @include('shared.input' , ['type' => 'number', 'placeholder' => 'Quantité','class' => 'col', 'name'=> 'Quantity[]', 'value'=> $sortie->Quantity])
                            @include('shared.input' , ['type' => 'number','placeholder' => 'Prix Unitaire/Montant','class' => 'col', 'name'=> 'Montant[]', 'value'=> $sortie->Montant]) 
                        </div>
                        
                       <div class="row">
                            @include('shared.selectsortie' , ['class' => 'col w-100','name'=> 'category_id[]', 'value'=> $sortie->Category()->pluck('id')->toArray() ?? []])
                            @include('shared.selectbene' , ['class' => 'col w-100','name'=> 'beneficiaire_id[]', 'value'=> $sortie->Beneficiaire()->pluck('id')->toArray() ?? []])
                            @include('shared.selectperso' , ['class' => 'col w-100','name'=> 'personnel_id[]', 'value'=> $sortie->Personnel()->pluck('id')->toArray() ?? []])
                       </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-primary" onclick="addEntry()"><i class="fa-solid fa-plus"></i> Ajouter une ligne</button>
                    <button type="submit" class="btn btn-primary">
                        {{ $sortie->exists ? 'Modifier' : 'Enregistrer' }}
                    </button>
                </div>
            </form>       
    </div>
    <script>
        let entryCount = 1;  // Nombre de lignes initial
        const maxEntries = 10;  // Limite maximale de lignes

        function addEntry() {
            if (entryCount >= maxEntries) {
                alert("Vous avez atteint la limite de 10 lignes.");
                return;
            }
            
            const entry = document.querySelector('.entry').cloneNode(true);
            entry.querySelectorAll('input').forEach(input => input.value = ""); // Réinitialise les valeurs des champs clonés
            document.getElementById('form-entries').appendChild(entry);
            entryCount++;
        }
    </script>
    
@endsection