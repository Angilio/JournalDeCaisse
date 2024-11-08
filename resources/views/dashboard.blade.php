@extends('layout.base')

@section('title', 'Home Page')

@section('content')
    <div id="contenu" class="w-100 bg-light"> 
        <div id="soldDepenseEntre" class="d-flex justify-content-between p-10">
            <div id="sold">
                <p><i class="fa-solid fa-clipboard"></i></p>
                <p class="fw-bold">
                    Sold Actuel <br>
                    Ar {{number_format($caisse->Sold, thousands_separator: ' ')  }}
                </p>
            </div>
            <div id="Entre">
                <P><i class="fa-solid fa-truck-fast"></i></P>
                <p class="fw-bold">
                    Total des Entrées<br>
                    Ar {{number_format($entre, thousands_separator: ' ')  }}
                </p>
            </div>
            <div id="Depense">
                <P><i class="fa-solid fa-clipboard"></i></P>
                <P class="fw-bold">
                    Total de Dépense<br>
                    Ar {{number_format($sortie, thousands_separator: ' ')  }}
                </P>
            </div>
        </div>
        <div class="container mt-2 text-dark">
            <p class="h4 d-flex justify-content-between">Resumé du mois <span class="bg-light">{{date('d/m/Y')}}</span></p>
            <canvas id="myChart" height="100"></canvas>
        </div>
        
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
        
        <div class="d-flex justify-content-between mt-5">
            <div class=" d-flex gap-10">  
                <div>
                    <h5>Statistique de sortie par categories</h5>
                    <canvas id="myPieChart" width="380" height="100"></canvas>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const sortiesParCategorie = @json($sortiesParCategorie); // Passer les données JSON

                        // Préparer les labels et les données pour le graphique
                        const labels = Object.keys(sortiesParCategorie);
                        const values = Object.values(sortiesParCategorie);

                        const ctx = document.getElementById('myPieChart').getContext('2d');
                        const myPieChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Statistique de sortie par catégories',
                                    data: values,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.7)',
                                        'rgba(54, 162, 235, 0.7)',
                                        'rgba(255, 206, 86, 0.7)',
                                        'rgba(75, 192, 192, 0.7)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)'
                                    ],
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'left',
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
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