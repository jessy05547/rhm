@extends('index.layouts')
@section('title', 'Tableau de bord - Application')
@section('content')
    <section class="dashboard-parent-ctx">
        <h2 class="title-ctx-init">Pointage des employés par jours</h2>
        <h2 class="statistique">Statistique de l'entreprise</h2>
        <h2 class="bar-depense">Consommation pour chaque poste</h2>
        <div class="ctx-partition-top">
            <div class="title-ctx">
                <h2 class="qte-employe">Nombre des employés</h2>
                <p class="nombre-employe">{{ $nombreEmployes }} employés travaillent actuellement.</p>
            </div>
            <div class="title-ctx">
                <h2 class="qte-employe">Nombre des absents</h2>
                <p class="nombre-employe">{{ $nombreAbsents }} absents aujourd'hui</p>
            </div>
            <div class="title-ctx">
                <h2 class="qte-employe">La depense de l'entreprise</h2>
                <p class="nombre-employe">Ar {{ $depense }}, c'est que l'entreprise doit payer.</p>
            </div>
        </div>
        <div class="dashboard-poste-depense">
            <canvas id="ChartDepensePoste"></canvas>
        </div>
        <div class="dashboard-parent" >
            <canvas id="ChartLine"></canvas>
        </div>
        <div class="dashboard-pagination">
            <h2 class="dashboard-pagination-title">Liste employé</h2>
            <table class="dashboard-table-employe">
                <thead class="dashboard-thead-employe">
                    <tr class="dashboard-tr-employe">
                        <th class="dashboard-th-employe">Nom</th>
                        <th class="dashboard-th-employe">Prénom</th>
                        <th class="dashboard-th-employe">Département</th>
                        <th class="dashboard-th-employe">Date d'embauche</th>
                    </tr>
                </thead>
                <tbody class="dashboard-tbody-employe">
                    @foreach ($employePagination as $employe)
                    <tr class="dashboard-tro-employe">
                        <td class="dashboard-td-employe">{{ $employe->nom }}</td>
                        <td class="dashboard-td-employe">{{ $employe->prenom }}</td>
                        <td class="dashboard-td-employe">{{ $employe->departements->departement }}</td>
                        <td class="dashboard-td-employe">{{ $employe->date_embauche }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dashboard-pagination-link">
                {{ $employePagination->links() }}
            </div>
        </div>
    </section>
    
    @vite(['resources\js\graphe.js'])
    <script type="module">
        
        const labels = {!! json_encode($labels) !!};
        const dataValue = {!! json_encode($data) !!};
        
        const postLabels = {!! json_encode($depenseLabels) !!};
        const postValues = {!! json_encode($depenseValues) !!};
        const ctxPoste = document.getElementById('ChartDepensePoste').getContext('2d');
        const ctx = document.getElementById('ChartLine').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgb(1, 5, 14)');   // Bleu semi-transparent en haut
        gradient.addColorStop(1, '#01252c');
        new Chart(ctxPoste, {
            type : 'bar',
            data : {
                labels : postLabels,
                datasets:[{
                    label: 'Dépense par poste',
                    data : postValues,
                    backgroundColor: gradient,
                    borderColor: '#0e49c7',
                    borderWidth: 1,
                    borderRadius: 3,
                    barPercentage: 0.5,
                    categoryPercentage: 0.5
                }]
            },
            options:{
                responsive: true,
                maintainAspectRatio: false,
                animations: {
                    y: {
                        easing: 'linear',
                        duration: 4000,
                        from: 500 // Les barres "montent" depuis le bas
                    },
                    opacity: {
                        duration: 2000,
                        from: 0,
                        to: 1
                    }
                }
            }
        });

        
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
               animation: {
        duration: 2000, // Temps total en ms
        easing: 'easeInOutQuart',
    },
    transitions: {
        active: {
            animation: {
                duration: 0 // Désactive l'animation lors du survol pour plus de fluidité
            }
        }
    },
    // Le secret pour l'effet de tracé est ici :
    animations: {
        x: {
            type: 'number',
            easing: 'linear',
            duration: 1500,
            from: NaN, // Démarre du point de données précédent
            delay(ctx) {
                if (ctx.type !== 'data' || ctx.xStarted) {
                    return 0;
                }
                ctx.xStarted = true;
                return ctx.index * 100; // Délai progressif pour chaque point
            }
        },
        y: {
            type: 'number',
            easing: 'linear',
            duration: 3000,
            from: (ctx) => ctx.chart.scales.y.getPixelForValue(0), // Part de la ligne 0
            delay(ctx) {
                if (ctx.type !== 'data' || ctx.yStarted) {
                    return 0;
                }
                ctx.yStarted = true;
                return ctx.index * 100;
                        }
                    }
                }
            }
        })
    </script>
@endsection