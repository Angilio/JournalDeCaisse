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
            <h4>Liste des sorties</h4>
            <a href="{{ route('sortie.sortie.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Nouvelle sortie</a>
        </div>
        
        <table class="mt-5 table table-striped">
        <thead>
            <tr>
                <td class="h4">Bénéficiaire</td>
                <td class="h4">Montant </td>
                <td class="h4">Description </td>
                <td class="h4">Categorie </td>
                <td class="h4">Quantité </td>
                <td class="h4">Date </td>
                <td class="h4 text-end">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($sorties as $sortie)
                
                <tr>
                    @foreach ($beneficiaires as $b => $bb)
                        @if ($b == $sortie->beneficiaire_id)
                            <td>{{ $bb }}</td>
                        @endif
                    @endforeach
                    <td>{{number_format($sortie->Montant, thousands_separator: ' ' ) }} Ar</td>
                    <td>{{ $sortie->Context }}</td>
                    @foreach ($categories as $k => $v)
                        @if ($k == $sortie->category_id)
                            <td>{{ $v }}</td>
                        @endif
                    @endforeach
                    <td ><span class="d-flex justify-content-center align-item-center">{{ $sortie->Quantity }}</span></td>
                    <td>{{ $sortie->date }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('sortie.sortie.edit', $sortie) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('sortie.sortie.destroy', $sortie) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sorties->links() }}  
    </div>
@endsection