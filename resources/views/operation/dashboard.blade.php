@extends('layouts.base')

@section('title', 'Home Page')

@section('content')
    <div class="w-100"> 
        <div class="container mt-2 text-info">
            <h1 class="text-center">Rapport des quatre dernier mois</h1>
            <canvas id="myChart"></canvas>
        </div>
        <script>
            // Données pour l'histogramme
            const data = {
                labels: ['Jan.', 'Fevr.', 'mars', 'Avril', 'Mai','Juin','Juillet','Août', 'Sept', 'Oct.','Nov.','Déc.'],
                datasets: [{
                    label: 'Fréquence',
                    data: [8,1,21,5,11,30,4,12, 19, 3, 5, 2],
                    backgroundColor: '##a52a2a96',
                    //borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
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
        <div class="container mt-5 text-info">
            <h2 class="text-center">Mon Diagramme Circulaire</h2>
            <canvas id="myPieChart" width="400" height="400"></canvas>
        </div>
        <script>
            // Récupérer l'élément canvas où le diagramme sera dessiné
            const ctx = document.getElementById('myPieChart').getContext('2d');

            // Créer le diagramme
            const myPieChart = new Chart(ctx, {
                type: 'pie', // Type de diagramme (circulaire)
                data: {
                    labels: ['Rouge', 'Bleu', 'Jaune', 'Vert', 'Violet', 'Orange'], // Noms des sections
                    datasets: [{
                        label: 'Couleurs préférées',
                        data: [12, 19, 3, 5, 2, 3], // Données pour chaque section
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)', // Rouge
                            'rgba(54, 162, 235, 0.7)', // Bleu
                            'rgba(255, 206, 86, 0.7)', // Jaune
                            'rgba(75, 192, 192, 0.7)', // Vert
                            'rgba(153, 102, 255, 0.7)', // Violet
                            'rgba(255, 159, 64, 0.7)'   // Orange
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1 // Épaisseur des bordures des sections
                    }]
                },
                options: {
                    responsive: true, // Rend le graphique adaptatif à l'écran
                    plugins: {
                        legend: {
                            position: 'top', // Position de la légende
                        },
                        tooltip: {
                            enabled: true // Active les infobulles
                        }
                    }
                }
            });
        </script>
    </div>
@endsection