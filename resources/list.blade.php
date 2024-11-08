use App\Models\Entrer;
use App\Models\Sortie;
use Carbon\Carbon;

public function listeParMois()
{
    // Récupérer les entrées, en groupant par mois
    $entrees = Entrer::selectRaw("MONTHNAME(date) as month, Montant, Description, date")
                     ->orderBy('date', 'asc')
                     ->get()
                     ->groupBy('month'); // Groupement par mois

    // Récupérer les sorties, en groupant également par mois
    $sorties = Sortie::selectRaw("MONTHNAME(date) as month, Montant, Description, date")
                     ->orderBy('date', 'asc')
                     ->get()
                     ->groupBy('month');

    // Passer les données groupées à la vue
    return view('votre_vue', compact('entrees', 'sorties'));
}



//vue

<div class="container">
    <h2>Liste des Entrées et Sorties par Mois</h2>

    @foreach($entrees as $month => $entreesMois)
        <!-- Afficher le mois en première ligne -->
        <h3>{{ $month }}</h3>

        <!-- Afficher les entrées du mois -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entreesMois as $entree)
                    <tr>
                        <td>{{ $entree->date->format('d/m/Y') }}</td>
                        <td>{{ $entree->Montant }}</td>
                        <td>{{ $entree->Description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    <!-- Affichage des sorties de la même manière -->
    @foreach($sorties as $month => $sortiesMois)
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
    @endforeach
</div>



/* selectionner et merger les données proviennent de deux tables differentes en laravel*/

use App\Models\Entrer;
use App\Models\Sortie;
use Illuminate\Support\Collection;
use Carbon\Carbon;

public function listeParMois()
{
    // Récupérer les entrées, ajouter une colonne 'type' et les convertir en collection
    $entrees = Entrer::selectRaw("MONTHNAME(date) as month, Montant, Description, date, 'Entrée' as type")
                     ->orderBy('date', 'asc')
                     ->get();

    // Récupérer les sorties, ajouter une colonne 'type' et les convertir en collection
    $sorties = Sortie::selectRaw("MONTHNAME(date) as month, Montant, Description, date, 'Sortie' as type")
                     ->orderBy('date', 'asc')
                     ->get();

    // Fusionner les deux collections et trier par date
    $transactions = $entrees->merge($sorties)->sortBy('date')->groupBy('month');

    // Passer la collection fusionnée et groupée à la vue
    return view('votre_vue', compact('transactions'));
}


<div class="container">
    <h2>Liste des Transactions par Mois</h2>

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
</div>

// {{-- Ajouter une ligne --}}

<form class="p-5" id="form" action="{{ route($sortie->exists ? 'sortie.sortie.update' : 'sortie.sortie.store', $sortie) }}" method="post">
    @csrf
    @method($sortie->exists ? 'put' : 'post')

    <div id="form-entries">
        <div class="entry row mt-4">
            @include('shared.date', [
                'type' => 'date', 
                'placeholder' => 'Date :', 
                'class' => 'col', 
                'name' => 'date[]', 
                'value' => $sortie->date
            ])
            @include('shared.input', ['type' => 'text', 'class' => 'col', 'name' => 'Context[]', 'value' => $sortie->Context])
            @include('shared.input', ['type' => 'number', 'placeholder' => 'Quantité', 'class' => 'col', 'name' => 'Quantity[]', 'value' => $sortie->Quantity])
            @include('shared.input', ['type' => 'number', 'placeholder' => 'Prix Unitaire/Montant', 'class' => 'col', 'name' => 'Montant[]', 'value' => $sortie->Montant])
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-secondary" onclick="addEntry()">Ajouter une ligne</button>
        <button type="submit" class="btn btn-primary">
            {{ $sortie->exists ? 'Modifier' : 'Enregistrer' }}
        </button>
    </div>
</form>

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



public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'date' => 'required|array',
        'date.*' => 'date',
        'Context' => 'required|array',
        'Context.*' => 'string',
        'Quantity' => 'required|array',
        'Quantity.*' => 'numeric|min:1',
        'Montant' => 'required|array',
        'Montant.*' => 'numeric|min:0',
        'category' => 'required',
        'beneficiaire_id' => 'required',
        'personnel_id' => 'required',
    ]);

    // Boucle pour chaque entrée
    foreach ($request->input('date') as $index => $date) {
        // Créer un nouvel enregistrement pour chaque ensemble de données
        Sortie::create([
            'date' => $date,
            'Context' => $request->input('Context')[$index],
            'Quantity' => $request->input('Quantity')[$index],
            'Montant' => $request->input('Montant')[$index],
            'category' => $request->input('category'),
            'beneficiaire_id' => $request->input('beneficiaire_id'),
            'personnel_id' => $request->input('personnel_id'),
        ]);
    }

    return redirect()->route('sortie.index')->with('success', 'Les sorties ont été enregistrées avec succès.');
}
