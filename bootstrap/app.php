<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest.only' => \App\Http\Middleware\RedirectIfAuthenticatedUser::class,
            'is.admin' => \App\Http\Middleware\RedirectIfAdmin::class,
            'is.user' => \App\Http\Middleware\RedirectIfUser::class,
            'prevent.back' => \App\Http\Middleware\PreventBackHistory::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
