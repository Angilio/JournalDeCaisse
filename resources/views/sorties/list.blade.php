@extends('layout.base')

@section('title', 'Les sorties')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>Liste des transactions</h4>
            <div>
                <a href="{{ route('showList') }}" class="btn btn-primary "><i class="fa-solid fa-link"></i></a>
                <a href="{{ route('entre.entre.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Entrées</a>
                <a href="{{ route('sortie.sortie.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Sorties</a>
            </div>
            <a href="{{ route('sortie.sortie.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Nouvelle Opération</a>
        </div>
        
        <h2>Liste des Entrées et Sorties par Mois</h2>

        @foreach($transactions as $month => $transactionsMois)
            <!-- Afficher le mois en première ligne -->
            <h3>{{ $month }}</h3>

            <!-- Afficher les transactions (entrées et sorties) du mois dans un seul tableau -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Montant</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactionsMois as $transaction)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->Montant }}</td>
                            <td>{{ $transaction->Description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <!-- Affichage des sorties de la même manière -->
        {{-- @foreach($sorties as $month => $sortiesMois)
            <!-- Afficher le mois en première ligne -->
            <h3>{{ $month }}</h3>

            <!-- Afficher les sorties du mois -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sortiesMois as $sortie)
                        <tr>
                            <td>{{ $sortie->date->format('d/m/Y') }}</td>
                            <td>{{ $sortie->Montant }}</td>
                            <td>{{ $sortie->Description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach --}}
    {{-- $transactionsMois->links() --}}  
    </div>
@endsection