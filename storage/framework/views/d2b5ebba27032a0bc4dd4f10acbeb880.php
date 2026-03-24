
<?php $__env->startSection('title', 'Mot de passe oublier - Utilisateur'); ?>
<?php $__env->startSection('content'); ?>
    <article class="login-parent">
        <div class="blur-login-content"></div>
        <form action="<?php echo e(route('token.get')); ?>" method="POST" id="user-login">
            <?php echo csrf_field(); ?>
            <h3 class="user-login-title">Mot de passe oublier</h3>
            <div class="user-login-ground">
                <div class="login-group">
                    <input type="email" name="email" id="login-input" required placeholder="votre.email@gmail.com">
                </div>
                <div class="login-validate">
                    <input type="submit" value="Génération de token" id="login-validate-btn">
                    <a href="<?php echo e(route('login')); ?>" class="register-user">retour au login</a>
                </div>
            </div>
        </form>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('authentification.login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/authentification/token.blade.php ENDPATH**/ ?>