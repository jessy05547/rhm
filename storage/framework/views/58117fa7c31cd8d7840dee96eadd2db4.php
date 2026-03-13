

<?php $__env->startSection('title', 'Modifier mon profil'); ?>

<?php $__env->startSection('content'); ?>
<div class="edit-profil-wrapper">

    
    <div class="edit-header">
        <div class="edit-avatar-bloc">
            <div class="edit-avatar-preview" id="avatarPreview">
                <?php if($utilisateur->hasMedia('photos')): ?>
                    <img src="<?php echo e($utilisateur->getFirstMediaUrl('photos')); ?>"
                         alt="Photo de profil"
                         id="currentAvatar">
                <?php else: ?>
                    <img src="<?php echo e(asset('images/default-avatar.png')); ?>"
                         alt="Avatar par défaut"
                         id="currentAvatar">
                <?php endif; ?>
                <div class="avatar-overlay" id="avatarOverlay">
                    <i class="fi fi-rr-camera"></i>
                </div>
            </div>
            <div class="edit-user-info">
                <h2 style="color:#fff;"><?php echo e($utilisateur->nom); ?> <?php echo e($utilisateur->prenom); ?></h2>
                <span class="edit-matricule"><?php echo e($utilisateur->matricule); ?></span>
                <span class="edit-poste"><?php echo e($utilisateur->postes->intitule ?? '—'); ?></span>
            </div>
        </div>
    </div>

    
    <form action="<?php echo e(route('user.edit')); ?>" method="POST" id="editForm">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-user"></i> Informations personnelles
            </h3>
            <div class="edit-grid">

                <div class="edit-field">
                    <label for="nom">Nom <span class="required">*</span></label>
                    <input type="text" id="nom" name="nom"
                           value="<?php echo e(old('nom', $utilisateur->nom)); ?>"
                           class="<?php echo e($errors->has('nom') ? 'input-error' : ''); ?>"
                           placeholder="Votre nom">
                    <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="prenom">Prénom <span class="required">*</span></label>
                    <input type="text" id="prenom" name="prenom"
                           value="<?php echo e(old('prenom', $utilisateur->prenom)); ?>"
                           class="<?php echo e($errors->has('prenom') ? 'input-error' : ''); ?>"
                           placeholder="Votre prénom">
                    <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="cin">CIN <span class="required">*</span></label>
                    <input type="text" id="cin" name="cin"
                           value="<?php echo e(old('cin', $utilisateur->cin)); ?>"
                           class="<?php echo e($errors->has('cin') ? 'input-error' : ''); ?>"
                           placeholder="12 chiffres"
                           maxlength="12">
                    <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="sexe">Sexe <span class="required">*</span></label>
                    <select id="sexe" name="sexe" class="<?php echo e($errors->has('sexe') ? 'input-error' : ''); ?>">
                        <option value="">-- Choisir --</option>
                        <option value="Masculin"  <?php echo e(old('sexe', $utilisateur->sexe) === 'Masculin'  ? 'selected' : ''); ?>>Masculin</option>
                        <option value="Féminin"   <?php echo e(old('sexe', $utilisateur->sexe) === 'Féminin'   ? 'selected' : ''); ?>>Féminin</option>
                    </select>
                    <?php $__errorArgs = ['sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="date_naissance">Date de naissance <span class="required">*</span></label>
                    <input type="date" id="date_naissance" name="date_naissance"
                           value="<?php echo e(old('date_naissance', \Carbon\Carbon::parse($utilisateur->date_naissance)->format('Y-m-d'))); ?>"
                           class="<?php echo e($errors->has('date_naissance') ? 'input-error' : ''); ?>">
                    <?php $__errorArgs = ['date_naissance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="telephone">Téléphone <span class="required">*</span></label>
                    <input type="text" id="telephone" name="telephone"
                           value="<?php echo e(old('telephone', $utilisateur->telephone)); ?>"
                           class="<?php echo e($errors->has('telephone') ? 'input-error' : ''); ?>"
                           placeholder="+261 XX XX XXX XX">
                    <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field edit-field--full">
                    <label for="adresse">Adresse <span class="required">*</span></label>
                    <input type="text" id="adresse" name="adresse"
                           value="<?php echo e(old('adresse', $utilisateur->adresse)); ?>"
                           class="<?php echo e($errors->has('adresse') ? 'input-error' : ''); ?>"
                           placeholder="Votre adresse complète">
                    <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>
        </div>

        
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-briefcase"></i> Informations professionnelles
            </h3>
            <div class="edit-grid">

                <div class="edit-field">
                    <label for="id_poste">Poste <span class="required">*</span></label>
                    <select id="id_poste" name="id_poste" class="<?php echo e($errors->has('id_poste') ? 'input-error' : ''); ?>">
                        <option value="">-- Choisir un poste --</option>
                        <?php $__currentLoopData = $postes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($poste->id); ?>"
                                <?php echo e(old('id_poste', $utilisateur->id_poste) == $poste->id ? 'selected' : ''); ?>>
                                <?php echo e($poste->poste); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['id_poste'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="id_departement">Département <span class="required">*</span></label>
                    <select id="id_departement" name="id_departement" class="<?php echo e($errors->has('id_departement') ? 'input-error' : ''); ?>">
                        <option value="">-- Choisir un département --</option>
                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dep->id); ?>"
                                <?php echo e(old('id_departement', $utilisateur->id_departement) == $dep->id ? 'selected' : ''); ?>>
                                <?php echo e($dep->departement); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['id_departement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="date_embauche">Date d'embauche <span class="required">*</span></label>
                    <input type="date" id="date_embauche" name="date_embauche"
                           value="<?php echo e(old('date_embauche', \Carbon\Carbon::parse($utilisateur->date_embauche)->format('Y-m-d'))); ?>"
                           class="<?php echo e($errors->has('date_embauche') ? 'input-error' : ''); ?>">
                    <?php $__errorArgs = ['date_embauche'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email"
                           value="<?php echo e(old('email', $utilisateur->email)); ?>"
                           class="<?php echo e($errors->has('email') ? 'input-error' : ''); ?>"
                           placeholder="email@exemple.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>
        </div>

        
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-camera"></i> Photo de profil
            </h3>
            <div class="edit-grid">
                <div class="edit-field edit-field--full">
                    
                    <input type="file" name="photo" id="register-photo-input" data-allow-reorder="true"> 
                    
                    <!-- <input type="hidden" name="photo" id="photo"> -->
                </div>
            </div>
        </div>

        
        <div class="edit-section">
            <h3 class="section-title toggle-pwd" id="togglePwd" style="cursor:pointer;">
                <i class="fi fi-rr-lock"></i> Changer le mot de passe
                <i class="fi fi-rr-angle-down toggle-icon" id="pwdIcon"></i>
            </h3>
            <div class="edit-grid" id="pwdFields" style="display:none;">

                <div class="edit-field">
                    <label for="password">Nouveau mot de passe</label>
                    <div class="pwd-wrapper">
                        <input type="password" id="password" name="password"
                               class="<?php echo e($errors->has('password') ? 'input-error' : ''); ?>"
                               placeholder="8 caractères minimum">
                        <button type="button" class="toggle-eye" data-target="password">
                            <i class="fi fi-rr-eye"></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="field-error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="edit-field">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="pwd-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               placeholder="Répétez le mot de passe">
                        <button type="button" class="toggle-eye" data-target="password_confirmation">
                            <i class="fi fi-rr-eye"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        
        <div class="edit-actions">
            <a href="<?php echo e(route('index.dashboard')); ?>" class="btn-annuler">
                <i class="fi fi-rr-cross"></i> Annuler
            </a>
            <button type="submit" class="btn-sauvegarder">
                <i class="fi fi-rr-check"></i> Enregistrer
            </button>
        </div>

    </form>
</div>


<style>
    .edit-profil-wrapper {
        max-width: 860px;
        margin: 0 auto;
        padding: 2rem 1.5rem 4rem;
        display: flex;
        flex-direction: column;
        gap: 1.8rem;
    }

    /* ── En-tête avatar ── */
    .edit-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding-bottom: 1.2rem;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .edit-avatar-bloc { display: flex; align-items: center; gap: 1.2rem; }
    .edit-avatar-preview {
        position: relative;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid #0e49c7;
        flex-shrink: 0;
    }
    .edit-avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity .2s;
        color: #fff;
        font-size: 1.3rem;
    }
    .edit-avatar-preview:hover .avatar-overlay { opacity: 1; }

    .edit-user-info { display: flex; flex-direction: column; gap: .25rem; }
    .edit-user-info h2 { margin: 0; font-size: 1.15rem; font-weight: 600; }
    .edit-matricule {
        font-size: .78rem;
        background: rgba(252,163,2,.15);
        color: #0e49c7;
        padding: .15rem .55rem;
        border-radius: 20px;
        width: fit-content;
    }
    .edit-poste { font-size: .82rem; opacity: .65; }

    /* ── Section ── */
    .edit-section {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 12px;
        padding: 1.5rem 1.5rem 1.2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .section-title {
        margin: 0 0 .4rem;
        font-size: .9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #0e49c7;
        display: flex;
        align-items: center;
        gap: .5rem;
    }
    .toggle-icon { margin-left: auto; font-size: .8rem; transition: transform .25s; }
    .toggle-icon.open { transform: rotate(180deg); }

    /* ── Grille champs ── */
    .edit-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem 1.5rem;
    }
    .edit-field { display: flex; flex-direction: column; gap: .35rem; }
    .edit-field--full { grid-column: 1 / -1; }

    .edit-field label {
        font-size: .8rem;
        font-weight: 500;
        opacity: .75;
        text-transform: uppercase;
        letter-spacing: .04em;
        color:#0e49c7;
    }
    .required { color: #0e49c7; }

    .edit-field input,
    .edit-field select {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 8px;
        padding: .6rem .85rem;
        color: #fff;
        font-size: .93rem;
        transition: border-color .2s, background .2s;
        outline: none;
        width: 100%;
        box-sizing: border-box;
    }
    .edit-field input:focus,
    .edit-field select:focus {
        border-color: #0e49c7;
        background: rgba(252,163,2,.06);
    }
    .input-error { border-color: #e53e3e !important; }
    .field-error { font-size: .78rem; color: #fc8181; }

    /* ── Password toggle ── */
    .pwd-wrapper { position: relative; }
    .pwd-wrapper input { padding-right: 2.6rem; }
    .toggle-eye {
        position: absolute;
        right: .7rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: inherit;
        opacity: .5;
        transition: opacity .2s;
        padding: 0;
    }
    .toggle-eye:hover { opacity: 1; }

    /* ── Boutons actions ── */
    .edit-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: .5rem;
    }
    .btn-annuler, .btn-sauvegarder {
        display: flex;
        align-items: center;
        gap: .45rem;
        padding: .65rem 1.5rem;
        border-radius: 8px;
        font-size: .9rem;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all .2s;
        border: none;
    }
    .btn-annuler {
        background: rgba(255,255,255,0.07);
        color: inherit;
        border: 1px solid rgba(255,255,255,0.12);
    }
    .btn-annuler:hover { background: rgba(255,255,255,0.12); }
    .btn-sauvegarder {
        background: #0e49c7;
        color: #1a1a1a;
        font-weight: 600;
    }
    .btn-sauvegarder:hover { background: #e09200; transform: translateY(-1px); }

    @media (max-width: 600px) {
        .edit-grid { grid-template-columns: 1fr; }
    }
</style>


<script>
    // Toggle section mot de passe
    document.getElementById('togglePwd').addEventListener('click', () => {
        const fields = document.getElementById('pwdFields');
        const icon   = document.getElementById('pwdIcon');
        const isOpen = fields.style.display !== 'none';
        fields.style.display = isOpen ? 'none' : 'grid';
        icon.classList.toggle('open', !isOpen);
    });

    // Afficher/masquer mot de passe
    document.querySelectorAll('.toggle-eye').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.target);
            input.type  = input.type === 'password' ? 'text' : 'password';
        });
    });

    
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/index/edit.blade.php ENDPATH**/ ?>