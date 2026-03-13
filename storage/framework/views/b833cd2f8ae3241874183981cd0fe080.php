
<?php $__env->startSection('title', 'Recherche - Employé présent'); ?>
<?php $__env->startSection('content'); ?>
<section class="src-parent">
    <div class="resultat-src">
        <?php $__empty_1 = true; $__currentLoopData = $presences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="" class="card-src">
                <h3 class="card-tilte-src"><?php echo e($employe->employes->nom); ?> <?php echo e($employe->employes->prenom); ?></h3>
                <p class="card-element-src">Statut : <?php echo e($employe->statut); ?></p>
                <p class="card-element-src">Date de pointage : <?php echo e($employe->date_pointage); ?></p>
                <p class="card-element-src">Heure d'entrée : <?php echo e($employe->check_in); ?></p>
                <p class="card-element-src">Heure de sortie : <?php echo e($employe->check_out); ?></p>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="font-size:20px;color:#e4ebec; font-weight:600;">Aucun employé trouvé.</p>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/presence/recherche.blade.php ENDPATH**/ ?>