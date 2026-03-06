
<?php $__env->startSection('title', 'Tableau de bord - Application'); ?>
<?php $__env->startSection('content'); ?>
    <section class="dashboard-parent-ctx">
        <div class="ctx-partition-top">
            <div class="title-ctx">
                <h2 class="title-ctx-init">Pointage dans les départements</h2>
                <p class="nombre-employe"><?php echo e($nombreEmployes); ?> employés</p>
            </div>
            <div class="card-ctx"></div>
        </div>
        <div class="dashboard-parent" style="width: 600px;">
            <canvas id="ChartLine"></canvas>
        </div>
        <div class="dashboard-pagination">
            <table class="dashboard-table-employe">
                <thead class="dashboard-thead-employe">
                    <tr class="dashboard-tr-employe">
                        <th class="dasboard-th-employe">Nom</th>
                        <th class="dasboard-th-employe">Prénom</th>
                        <th class="dasboard-th-employe">Département</th>
                        <th class="dasboard-th-employe">Date d'embauche</th>
                    </tr>
                </thead>
                <tbody class="dashboard-tbody-employe">
                    <?php $__currentLoopData = $employePagination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="dashboard-tro-employe">
                        <td class="dashboard-td-employe"><?php echo e($employe->nom); ?></td>
                        <td class="dashboard-td-employe"><?php echo e($employe->prenom); ?></td>
                        <td class="dashboard-td-employe"><?php echo e($employe->departement); ?></td>
                        <td class="dashboard-td-employe"><?php echo e($employe->date_embauche); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="dashboard-pagination-link">
                <?php echo e($employePagination->links()); ?>

            </div>
        </div>
    </section>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources\js\graphe.js']); ?>
    <script type="module">
        
        const labels = <?php echo json_encode($labels); ?>;
        const dataValue = <?php echo json_encode($data); ?>;
        
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/index/dashboard.blade.php ENDPATH**/ ?>