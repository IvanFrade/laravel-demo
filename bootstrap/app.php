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
    ->withMiddleware(function (Middleware $middleware): void {
        // Redirect guests to index
        $middleware->redirectGuestsTo('/');
        
        // Redirect users to home screen
        $middleware->redirectUsersTo('/home/books');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
