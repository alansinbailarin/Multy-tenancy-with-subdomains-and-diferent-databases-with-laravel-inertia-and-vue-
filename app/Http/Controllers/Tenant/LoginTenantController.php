<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginTenantController extends Controller
{
    public function create()
    {
        $registerRoute = env('APP_URL') . '/register';

        return inertia('Tenant/Login', [
            'registerRoute' => $registerRoute
        ]);
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }
}
