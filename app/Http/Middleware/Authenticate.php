<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Verificar si el inquilino está presente
        if ($request->routeIs('tenant.*')) {
            // Redirigir a la ruta de inicio de sesión del inquilino
            return $request->expectsJson() ? null : route('tenant.login');
        }

        // Redirigir a la ruta de inicio de sesión predeterminada para usuarios no inquilinos
        return $request->expectsJson() ? null : route('login');
    }
}
