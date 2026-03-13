
<?php $__env->startSection('title', 'Demande de congé'); ?>
<?php $__env->startSection('content'); ?>
    <section class="demande-conge-parent">
        <h2 style="color:#0e49c7; font-size:18px; font-weight:600;
            margin-bottom:25px;">Prendre une congé</h2>  

        <div class="demande-conge-form">
            <form action="<?php echo e(route('conge.demande')); ?>" method="post" id="demande-conge-ajout">
                <?php echo csrf_field(); ?>
                <div class="demande-conge-group">
                    <label for="id_employe" class="demande-conge-lab">Nom complet *</label>
                    <select name="id_employe" id="demande-conge-option-one" required>
                        <?php $__currentLoopData = $employes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employe->id); ?>" id="demande-conge-input"><?php echo e($employe->nom); ?> <?php echo e($employe->prenom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="demande-conge-group">
                    <label for="check_in" class="demande-conge-lab">Debut de congé *</label>
                    <input type="date" id="demande-conge-input-in" name="date_sortie" required >
                </div>
                <div class="demande-conge-group">
                    <label for="date_entre" class="demande-conge-lab">Fin de congé *</label>
                    <input type="date" id="demande-conge-input-out" name="date_entre" required>
                    <small id="message-erreur"></small>
                </div>
                <div class="demande-conge-group">
                    <label for="type" class="demande-conge-lab">Type de congé *</label>
                    <select name="types" id="demande-conge-input" required>
                        <option value="Congé de maternité">Congé de maternité</option>
                        <option value="Congé de paternité">Congé de paternité</option>
                        <option value="Congé annuelle">Congé annuelle</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <!-- <div class="demande-conge-group">
                    <label for="type" class="demande-conge-lab">Motifs *</label>
                    <textarea name="motifs" id="demande-conge-input" rows="4" cols="4" disabled></textarea>
                </div> -->
                <div class="demande-conge-group">
                    <label for="validation" class="demande-conge-lab">Validation *</label>
                    <input type="text" id="demande-conge-input" name="validation" required>
                </div>
                <div class="demande-conge-validate">
                    <input type="submit" id="conge-validate" value="Poster le congé">
                </div>
            </form>
        </div>
    </section>
    <script>
        const dateIn = document.getElementById('demande-conge-input-in');
        const dateOut = document.getElementById('demande-conge-input-out');
        const [anne,mois,jour] = dateIn.value.split("-");
        const debut = new Date(anne, mois - 1, jour);
        const [y,m,d] = dateIn.value.split("-");
        const fin = new Date(y, m - 1, d);
        const err = document.getElementById('message-erreur');
        
        dateOut.addEventListener('change', () => {
            let condition = debut.getFullYear() >= fin.getFullYear() && debut.getDay() >= fin.getDay();
            let conditionS = debut.getMonth() >= fin.getMonth() && debut.getDay() >= fin.getDay();
            if( condition === true && conditionS === true ){
                err.textContent = "La date fin est supérieur au date du debut!";
                err.style.color = "red";
                err.style.fontSize = "12px";
                dateOut.value = ""; 
                dateIn.value = undefined;        
            }else{
                err.textContent = "les dates sont correspondre!";
                err.style.color = "green";
                err.style.fontSize = "12px";
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/conge/demandeConge.blade.php ENDPATH**/ ?>