@extends('layout.base')

@section('title', 'Les entrées')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>Liste des entrées</h4>
            <a href="{{ route('entre.entre.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Nouvelle entrée</a>
        </div>
        
        <table class="mt-5 table table-striped">
        <thead>
            <tr>
                <td class="h4">Montant </td>
                <td class="h4">Description </td>
                <td class="h4">Categorie </td>
                <td class="h4">Date </td>
                <td class="h4 text-end">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($entres as $entre)
                
                <tr>
                    <td>{{ $entre->Montant }}</td>
                    <td>{{ $entre->Description }}</td>
                    @foreach ($categories as $k => $v)
                        @if ($k == $entre->category_enter_id)
                            <td>{{ $v }}</td>
                        @endif
                    @endforeach
                    <td>{{ $entre->date }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('entre.entre.edit', $entre) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('entre.entre.destroy', $entre) }}" method="post">
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
    {{ $entres->links() }}  
    </div>
@endsection