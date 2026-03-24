<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/login.css', 'resources/js/app.js','resources/js/chunking.js','resources/js/controlChamp.js', 'resources/css/style.css']); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\rhm\resources\views/authentification/login.blade.php ENDPATH**/ ?>