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
        // C'est ici qu'on définit les exceptions CSRF dans Laravel 11
        $middleware->validateCsrfTokens(except: [
            'filepond/api/*', 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();