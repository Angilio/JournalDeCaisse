@extends('layout.base')

@section('title', 'Home Page')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        <div class="container mt-2 text-dark">
            <p class="h4 d-flex justify-content-between">Resumé du mois <span class="bg-light">{{date('d/m/Y')}}</span></p>
            <canvas id="myChart" height="120"></canvas>
        </div>
        <script>
            // Données pour l'histogramme
            const data = {
                labels: ['Jan.', 'Fevr.', 'mar.', 'Avr.', 'Mai','Jui.','Juil.','Août', 'Sept.', 'Oct.','Nov.','Déc.'],
                datasets: [{
                    label: 'Sold',
                    data: [8,1,21,5,11,24,4,12, 19, 3, 5, 2],
                    backgroundColor: '#0000ff',
                    //borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 0,
                    borderRadius: 7
                },{
                    label: 'Entrées',
                    data: [4,14,2,15,1,3,18,2, 9, 13, 15, 12],
                    backgroundColor: '#6de46d',
                    //borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 0,
                    borderRadius: 7
                },{
                    label: 'Sortie',
                    data: [18,11,12,15,14,13,24,22, 9, 23, 25, 5],
                    backgroundColor: '#e46161e9',
                    //borderColor: 'rgba(75, 192, 192, 1)',
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
        
        <div class="d-flex justify-content-between mt-5">
            <div class=" d-flex gap-10">  
                <div>
                    <h5>Statistique de sortie par categories</h5>
                    <canvas id="myPieChart" width="400" height="200"></canvas>
                </div>
                <script>
                // Récupérer l'élément canvas où le diagramme sera dessiné
                const ctx = document.getElementById('myPieChart').getContext('2d');

                // Créer le diagramme
                const myPieChart = new Chart(ctx, {
                    type: 'doughnut', // Type de diagramme (circulaire)
                    data: {
                        labels: ['Matériel', 'Transport', 'Produit Menager', 'Comunication'], // Noms des sections
                        datasets: [{
                            label: 'Couleurs préférées',
                            data: [12, 19, 3, 5], // Données pour chaque section
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)', // Rouge
                                'rgba(54, 162, 235, 0.7)', // Bleu
                                'rgba(255, 206, 86, 0.7)', // Jaune
                                'rgba(75, 192, 192, 0.7)', // Vert
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 0 // Épaisseur des bordures des sections
                        }]
                    },
                    options: {
                        responsive: true, // Rend le graphique adaptatif à l'écran
                        plugins: {
                            legend: {
                                position: 'left', // Position de la légende
                            },
                            tooltip: {
                                enabled: true // Active les infobulles
                            }
                        }
                    }
                });
                </script>
            </div>
            <div class="w-50">
                <h5>Visualisation des Entrées de 4 derniers mois</h5>
                {{ date('d/m/Y')}}
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, voluptatum veniam temporibus a molestias quas illo consequatur! Quidem, veniam molestias doloribus assumenda aut debitis, nesciunt aspernatur inventore ipsam, dolorum eos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint inventore minima quisquam dolorem alias, eligendi iste at voluptate porro molestias vero, et necessitatibus architecto facilis quibusdam? Autem voluptatem doloremque molestias? Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis error dolorum mollitia cum molestias commodi quam, quasi nemo omnis labore totam odio libero voluptates dolore sed nobis eius ipsum ullam!</p>
            </div>
        </div>
    </div>
@endsection