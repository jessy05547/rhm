<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // On remplace 'filepond/api/*' par 'upload/*' 
        // car tes nouvelles routes dans web.php commencent par /upload
        $middleware->validateCsrfTokens(except: [
            'upload/*', 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();