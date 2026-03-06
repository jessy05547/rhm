
<?php $__env->startSection('title', 'Pointage - Application'); ?>
<?php $__env->startSection('content'); ?>
    <article class="pointage-parent">
        <h3 class="pointage-title">Réaliser le pointage</h3>
        <div class="pointage-formulaire">
            <button id="checkin">Entrée</button>
            <!-- <button id="checkout">Sortie</button> -->
        </div>
        <div class="pointage-affichage">
            <h3 class="pointage-title">Tableau de pointage</h3>
            <table class="pointage-affichage-table">
                <thead class="pointage-head-affichage">
                    <tr class="pointage-tr-head">
                        <th class="libelle-proprietaire">NOM COMPLET</th>
                        <th class="libelle-proprietaire">ENTREE</th>
                        <th class="libelle-proprietaire">SORTIE</th>
                        <th class="libelle-proprietaire">STATUT</th>
                        <th class="libelle-proprietaire">MOTIF</th>
                        <th class="libelle-proprietaire">DATE</th>
                        <th class="libelle-proprietaire">ACTION</th>
                    </tr>
                </thead>
                <tbody class="pointage-body-affichage">
                    <?php $__currentLoopData = $presences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $present): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="pointage-body-tr">
                        <td class="resultat-element-pointage"><?php echo e($present->employes->nom); ?> <span class="resultat-prenom"><?php echo e($present->employes->prenom); ?></span></td>
                        <td class="resultat-element-pointage"><?php echo e($present->check_in); ?></td>
                        <td class="resultat-element-pointage"><?php echo e($present->check_out); ?></td>
                        <td class="resultat-element-pointage"><?php echo e($present->statut); ?></td>
                        <td class="resultat-element-pointage"><?php echo e($present->motifs); ?></td>
                        <td class="resultat-element-pointage"><?php echo e($present->date_pointage); ?></td>
                        <td class="resultat-element-pointage">
                            <button class="btn-checkout"
                            data-id="<?php echo e($present->id); ?>" 
                            data-nom="<?php echo e($present->employes->nom ?? 'Inconnu'); ?> <?php echo e($present->employes->prenom ?? ''); ?>"
                            data-statut="<?php echo e($present->statut); ?>"
                            data-date="<?php echo e($present->date_pointage); ?>"
                            data-check_in="<?php echo e($present->check_in); ?>"
                            >Sortir</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </article>
    <div id="blur-conteneur" style="display: none;"></div>
    <section id="check-in-parent" style="display: none;">
        <div class="check-in-conteneur">
            <h2 class="check-in-title">Moment de pointage</h2>
            <form action="<?php echo e(route('store.pointage')); ?>" method="post" id="check-in-formulaire">
                <?php echo csrf_field(); ?>
                <div class="check-in-groupe">
                    <label for="id_employe" class="check-in-lab">Matricule *</label>
                    <select name="id_employe" id="check-in-input" required>
                        <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="check-in-option" value="<?php echo e($employe->id); ?>"><?php echo e($employe->nom); ?> <?php echo e($employe->prenom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="check-in-groupe">
                    <label for="statut" class="check-in-lab">Statut *</label>
                    <select name="statut" id="check-in-input-select" required>
                        <option id="check-in-option" value="Présent">Présent</otpion>
                        <option id="check-in-option" value="Retard">Retard</otpion>
                    </select>
                </div>
                <div class="check-in-groupe">
                    <label for="date_pointage" class="check-in-lab">Date du jours *</label>
                    <input type="date" name="date_pointage" id="check-in-input-date" required>
                    <small id="message-error"></small>
                </div>
                <div class="check-in-groupe">
                    <label for="check_in" class="check-in-lab">Heure d'entrée *</label>
                    <input type="time" name="check_in" id="check-in-input">
                </div>
                <div class="check-in-groupe">
                    <label for="motifs" class="check-in-lab">Motifs *</label>
                    <input type="text" name="motifs" id="check-in-input-motifs" required>
                </div>
                <div class="check-in-validate">
                    <input type="submit" value="Présence" id="validate-checkIN">
                </div>
                <div class="icon-sortie">
                    <i class="fi fi-rr-circle-xmark" style="position:absolute;top:15px;right:15px;cursor:pointer;" id="fermer"></i>
                </div>
            </form>
        </div>
    </section>
    <section id="check-out-parent" style="display: none;">
        <div class="check-in-conteneur">
            <h2 class="check-in-title">Valider la sortie</h2>
            <form action="" method="post" id="form-checkout">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="check-in-groupe">
                    <label class="check-in-lab">Nom complet *</label>
                    <input type="text" id="out-nom" disabled >
                </div>
                <div class="check-in-groupe">
                    <label class="check-in-lab">Statut *</label>
                    <input type="text" id="out-statut" disabled >
                </div>
                <div class="check-in-groupe">
                    <label for="date_presence" class="check-in-lab">Date du jours *</label>
                    <input type="date" name="date_presence" id="out-date"  disabled >
                </div>
                <div class="check-in-groupe">
                    <label for="check_out" class="check-in-lab">Heure de sortie *</label>
                    <input type="time" name="check_out" id="check-in-input-out">
                </div>
                <div class="check-in-validate">
                    <input type="submit" value="Sortie" id="validate-checkIN">
                </div>
                <div class="icon-sortie">
                    <i class="fi fi-rr-circle-xmark" style="position:absolute;top:15px;right:15px;cursor:pointer;" id="quit"></i>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    const getCheckin = document.getElementById('checkin');
    const getCheckOut = document.querySelectorAll('.btn-checkout');
    const Conteneur = document.getElementById('blur-conteneur');
    const printModal = document.getElementById('check-in-parent');
    const quitter = document.getElementById('fermer');
    const sortir = document.getElementById('check-out-parent');
    const xmark = document.getElementById('quit');
    
    const formCheckout = document.getElementById('form-checkout');
    const outNom = document.getElementById('out-nom');
    const outStatut = document.getElementById('out-statut');
    const outDate = document.getElementById('out-date');

    const datePointage = document.getElementById('check-in-input-date');
    const errorMessage = document.getElementById('message-error');

    datePointage.addEventListener('input', () => {
        const selectedDate = new Date(datePointage.value);
        selectedDate.setHours(0, 0, 0, 0); // Réinitialiser l'heure pour comparer uniquement les dates
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Réinitialiser l'heure pour comparer uniquement les dates

        if (selectedDate > today) {
            errorMessage.textContent = "La date ne peut pas être dans le futur.";
            errorMessage.style.color = "#d32f2f";
            errorMessage.style.fontSize = "12px";
            datePointage.value = ''; // Réinitialiser le champ de date
        } else {
            errorMessage.textContent = "La date est valide."; // Effacer le message d'erreur si la date est valide
            errorMessage.style.color = "#388e3c";
            errorMessage.style.fontSize = "12px";
            errorMessage.style.fontWeight = "500";
        }
    });
    getCheckOut.forEach(button => {
        button.addEventListener('click', () => {
            const nom = button.getAttribute('data-nom');
            const statut = button.getAttribute('data-statut');
            const date = button.getAttribute('data-date');
            formCheckout.action = `/presence/presenceAjout/${button.getAttribute('data-id')}`;

            outNom.value = nom;
            outStatut.value = statut;
            outDate.value = date;
            Conteneur.style.display = 'block';
            Conteneur.style.backdropFilter = 'blur(5px)';
            sortir.style.display = 'block';
        });
    });


    getCheckin.addEventListener('click', () => {
        Conteneur.style.display = 'block';
        Conteneur.style.backdropFilter = 'blur(5px)';
        printModal.style.display = 'block';
    })
    
    Conteneur.addEventListener('click', () => {
        Conteneur.style.display = 'none';
        printModal.style.display = 'none';
        sortir.style.display = 'none';
    })
    quitter.addEventListener('click', () =>{
        Conteneur.style.display = 'none';
        printModal.style.display = 'none';
    })
    xmark.addEventListener('click', () =>{
        Conteneur.style.display = 'none';
        sortir.style.display = 'none';
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/presence/presenceAjout.blade.php ENDPATH**/ ?>