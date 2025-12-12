<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CheckForLogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        /*
        |--------------------------------------------------------------------------
        | Global Middleware (runs for all requests)
        |--------------------------------------------------------------------------
        |
        | Example:
        | $middleware->push(\App\Http\Middleware\TrustProxies::class);
        |
        */

        // $middleware->push(...); // optional global middleware

        /*
        |--------------------------------------------------------------------------
        | Route Middleware Aliases
        |--------------------------------------------------------------------------
        |
        | These aliases can be used in routes as 'admin.auth' and 'admin.guest'
        |
        */
        $middleware->alias([
            'admin.auth' => AdminAuth::class,
            'admin.guest' => CheckForLogin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Exception handling configuration
    })
    ->create();
