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
    // this changed for guest and admin ***Written By me hai ta default haina
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(
            [
                'admin.guest' => App\Http\Middleware\AdminRedirect::class,
                'admin.auth' => App\Http\Middleware\AdminAuthenticate::class,
                'teacher.guest' => App\Http\Middleware\TeacherRedirect::class,
                'teacher.auth' => App\Http\Middleware\TeacherAuthenticate::class,
            ],
        );

        ///this  part of code is to restrict the unauthorized users to getting to diffrent pages.
        $middleware->redirectTo(
            guests: '/student/login',
            users: '/student/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
