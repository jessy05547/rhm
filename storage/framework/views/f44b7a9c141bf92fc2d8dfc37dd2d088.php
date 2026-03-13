
<?php $__env->startSection('title', 'Recherche - Employé'); ?>
<?php $__env->startSection('content'); ?>
    <div class="src-parent">
        <div class="resultat-src">
            <?php $__empty_1 = true; $__currentLoopData = $employes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('employe.update', $employe->id)); ?>" class="card-src">
                <h3 class="card-tilte-src"><?php echo e($employe->postes->poste); ?></h3>
                <p class="card-element-src">Nomination : <?php echo e($employe->nom); ?></p>
                <p class="card-element-src">Prénom : <?php echo e($employe->prenom); ?></p>
                <p class="card-element-src">Departement : <?php echo e($employe->departements->departement); ?></p>
                <p class="card-element-src">Debut de travail : <?php echo e($employe->date_embauche); ?></p>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr class="card-nonNull" style="
            width:100%;
            height:40px;
            background: rgba(255, 255, 255, 0.308);
            color:#01252c;
            font-size:14px;
            display:flex;
            justify-content:center;
            align-items:center;
            border-radius: 12px;
            margin-top: 20px;
            ">
                <p class="card-vide" style="
                font-size:23px;
                color:#01252c;
                font-weight:600;
                ">Aucun resultat trouvé!</p>
            </tr>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/employe/search.blade.php ENDPATH**/ ?>