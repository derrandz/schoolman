<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \App\Http\Middleware\InitSessions::class,       
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'set_proper_database' => \App\Http\Middleware\SetProperDatabase::class,
        'isauth' => \App\Http\Middleware\isAuthenticated::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'set_central_database' => \App\Http\Middleware\SetCentralDatabase::class,
        'role' => \App\Http\Middleware\CheckForRole::class,
        'set_school_id' => \App\Http\Middleware\SetSchoolId::class,
    ];
}
