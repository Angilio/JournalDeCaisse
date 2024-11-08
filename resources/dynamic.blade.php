use App\Models\Entrer;
use App\Models\Caisse;
use Carbon\Carbon;

public function index()
{
    // Récupérer les montants d'entrée, de sortie et le solde de caisse pour chaque mois
    $sold = Caisse::selectRaw("MONTH(date) as month, SUM(Sold) as total")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month');

    $entrees = Entrer::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month');

    // Ici, il faudra adapter pour les sorties si elles sont enregistrées dans une autre table
    $sorties = Sortie::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month');

    // Passer les données sous forme de tableau associatif pour chaque mois
    return view('votre_vue', [
        'soldData' => $sold->values(),
        'entreesData' => $entrees->values(),
        'sortiesData' => $sorties->values(),
    ]);
}

 /* 2. Passer les données à JavaScript dans la vue
Ensuite, dans votre vue, insérez les données directement dans le script JavaScript : */

<div class="container mt-2 text-dark">
    <p class="h4 d-flex justify-content-between">Résumé du mois <span class="bg-light">{{ date('d/m/Y') }}</span></p>
    <canvas id="myChart" height="100"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Récupérer les données du contrôleur
    const soldData = @json($soldData);
    const entreesData = @json($entreesData);
    const sortiesData = @json($sortiesData);

    // Données pour l'histogramme
    const data = {
        labels: ['Jan.', 'Fevr.', 'Mar.', 'Avr.', 'Mai','Juin','Juil.','Août', 'Sept.', 'Oct.','Nov.','Déc.'],
        datasets: [{
            label: 'Sold',
            data: soldData,
            backgroundColor: '#0000ff',
            borderWidth: 0,
            borderRadius: 7
        },{
            label: 'Entrées',
            data: entreesData,
            backgroundColor: '#6de46d',
            borderWidth: 0,
            borderRadius: 7
        },{
            label: 'Sortie',
            data: sortiesData,
            backgroundColor: '#e46161e9',
            borderWidth: 0,
            borderRadius: 7
        }]
    };

    // Configuration de l'histogramme
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Initialisation de l'histogramme
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>



/* recuperer tous les mois de l'années et met une valeur par defaut pour les mois qui ne sont pas encore franchi */


use App\Models\Entrer;
use App\Models\Caisse;
use Carbon\Carbon;

public function index()
{
    // Initialiser les données avec tous les mois de l'année, en mettant 0 par défaut
    $sold = array_fill(0, 12, 0);
    $entrees = array_fill(0, 12, 0);
    $sorties = array_fill(0, 12, 0);

    // Récupérer les données réelles de la base de données et les remplir dans les tableaux
    $soldData = Caisse::selectRaw("MONTH(date) as month, SUM(Sold) as total")
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('total', 'month');

    $entreesData = Entrer::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('total', 'month');

    $sortiesData = Sortie::selectRaw("MONTH(date) as month, SUM(Montant) as total")
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('total', 'month');

    // Remplir les valeurs par défaut pour chaque mois
    foreach ($soldData as $month => $total) {
        $sold[$month - 1] = $total; // $month - 1 car les mois commencent à 1
    }
    foreach ($entreesData as $month => $total) {
        $entrees[$month - 1] = $total;
    }
    foreach ($sortiesData as $month => $total) {
        $sorties[$month - 1] = $total;
    }

    return view('votre_vue', [
        'soldData' => $sold,
        'entreesData' => $entrees,
        'sortiesData' => $sorties,
    ]);
}



<div class="container mt-2 text-dark">
    <p class="h4 d-flex justify-content-between">Résumé du mois <span class="bg-light">{{ date('d/m/Y') }}</span></p>
    <canvas id="myChart" height="100"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Récupérer les données du contrôleur
    const soldData = @json($soldData);
    const entreesData = @json($entreesData);
    const sortiesData = @json($sortiesData);

    // Données pour l'histogramme
    const data = {
        labels: ['Jan.', 'Fevr.', 'Mar.', 'Avr.', 'Mai','Juin','Juil.','Août', 'Sept.', 'Oct.','Nov.','Déc.'],
        datasets: [{
            label: 'Sold',
            data: soldData,
            backgroundColor: '#0000ff',
            borderWidth: 0,
            borderRadius: 7
        },{
            label: 'Entrées',
            data: entreesData,
            backgroundColor: '#6de46d',
            borderWidth: 0,
            borderRadius: 7
        },{
            label: 'Sortie',
            data: sortiesData,
            backgroundColor: '#e46161e9',
            borderWidth: 0,
            borderRadius: 7
        }]
    };

    // Configuration de l'histogramme
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Initialisation de l'histogramme
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>