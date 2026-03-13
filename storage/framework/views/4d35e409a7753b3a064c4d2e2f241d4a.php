
<?php $__env->startSection('title', 'Authentification - Utilisateur'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session('error')): ?>
        <div class="error-message" style="width:300px;height: auto;color: #d32f2f;background: #131216; padding: 10px; border-radius: 5px;display: flex;justify-content:center;font-weight: 500;align-items:center;gap:10px;position:absolute;z-index:9999;top:20px;left:0;right:0;margin:auto;">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('sussecc')): ?>
        <div class="success" style="color: #2fd345;background: #131216; padding: 10px; border-radius: 5px;display: flex;justify-content:center;width:300px;height: 5vh;font-weight: 500;align-items:center;gap:10px;position:absolute;z-index:9999;top:20px;left:0;right:0;margin:auto;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="blur-login"></div>
    <header class="login-parent">
        <form action="<?php echo e(route('user.login')); ?>" method="POST" id="user-login">
            <?php echo csrf_field(); ?>
            <h3 class="user-login-title">Authentification</h3>
            <div class="user-login-ground">
                <div class="login-group">
                    <!-- <label for="email" class="login-lab">E-mail *</label> -->
                    <input type="email" name="email" id="login-input" required placeholder="votre.email@gmail.com">
                </div>
                <div class="login-group">
                    <!-- <label for="password" class="login-lab">Mot de passe *</label> -->
                    <input type="password" name="password" required id="login-input" placeholder="Mot de passe">
                </div>
                <div class="login-validate">
                    <input type="submit" value="Se connecter" id="login-validate-btn">
                    <a href="<?php echo e(route('authentification.register')); ?>" class="register-user">Créer un compte</a>
                </div>
            </div>
        </form>
        <!-- <div class="login-text-script">
            <h2 class="text-user-login">gestion des ressources humains</h2>
        </div> -->
    </header>
    <script>
        try{
            history.pushState(null,null,location.href);
            window.addEventListener('popstate', function (e){
                e.preventDefault();
                location.replace("<?php echo e(route('login')); ?>")
            });
        }catch (e) {

        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('authentification.login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\rhm\resources\views/authentification/user.blade.php ENDPATH**/ ?>