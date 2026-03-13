
<?php $__env->startSection('title', 'Liste de demande de conge - Employé'); ?>
<?php $__env->startSection('content'); ?>
    <section class="conge-liste-parent">
        <h2 style="color:#0e49c7; font-size:14px; font-weight:600;
            margin-bottom:25px;">Prendre une congé</h2>  
        <div class="bouton-autre-option">
            <a href="<?php echo e(route('conge.demandeConge')); ?>" class="ajouter-demande-conge">
                <i class="fi fi-sr-add" style="color:#01252c;"></i>
                <span class="btn-autre-option" >
                    Demande de congé
                </span>    
            </a>
        </div>
        <div class="tableau-border-conge">
            <h2 style="color:#0e49c7; font-size:14px; font-weight:600;
            margin-bottom:25px;">Liste des demandes de congés</h2>  
            <table class="table-conge-externe">
                <thead class="header-table-conge">
                    <tr class="tr-conge-head">
                        <th class="entete-conge-head">Nom complet</th>
                        <th class="entete-conge-head">Début de congé</th>
                        <th class="entete-conge-head">Fin de congé</th>
                        <th class="entete-conge-head">Type de congé</th>
                        <th class="entete-conge-head">Validation</th>
                    </tr>
                </thead>
                <tbody class="body-conge-element">
                    <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="body-conge-tr">
                            <td class="body-info-conge"><?php echo e($cg->employees->nom); ?> <?php echo e($cg->employees->prenom); ?></td>
                            <td class="body-info-conge"><?php echo e($cg->date_sortie); ?></td>
                            <td class="body-info-conge"><?php echo e($cg->date_entre); ?></td>
                            <td class="body-info-conge"><?php echo e($cg->types); ?></td>
                            <td class="body-info-conge"><?php echo e($cg->validation); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/conge/liste.blade.php ENDPATH**/ ?>