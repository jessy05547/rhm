@extends('index.layouts')
@section('title', 'Tableau de bord - Application')
@section('content')
    <section class="dashboard-parent-ctx">
        <div class="ctx-partition-top">
            <div class="title-ctx">
                <h2 class="title-ctx-init">Pointage dans les départements</h2>
                <a href="{{ route('presence.presenceAjout') }}" class="lien-ctx-init">Faire la présence</a>
            </div>
            <div class="card-ctx"></div>
        </div>
        <div class="dashboard-parent" style="width: 600px;">
            <canvas id="ChartLine"></canvas>
        </div>
        <div class="dashboard-pagination">

        </div>
    </section>
    
    @vite(['resources\js\graphe.js'])
    <script type="module">
        
        const labels = {!! json_encode($labels) !!};
        const dataValue = {!! json_encode($data) !!};
        
        const ctx = document.getElementById('ChartLine').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgb(1, 5, 14)');   // Bleu semi-transparent en haut
        gradient.addColorStop(1, '#01252c');
        new Chart(ctx, {
            type : 'line',
            data : {
                labels : labels,
                datasets:[{
                    label: 'taux de présence des employés',
                    data :dataValue,
                    fill:true,
                    fillColor: gradient,
                    lineTension: 0.4,
                    tension : 0.4,
                    backgroundColor: gradient,
                    borderColor: 'rgb(5, 55, 121)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options:{
                responsive: true,
                maintainAspectRatio: false, // Permet au graphique de mieux s'adapter
                scales: {
                    y: { beginAtZero: true }
                }
            }
        })
    </script>
@endsection