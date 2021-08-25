<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected string $trainer_route  = 'trainer.login';
    protected string $admin_route = 'admin.login';

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('trainer.*')) {
                return route($this->trainer_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            }
        }
    }
}
