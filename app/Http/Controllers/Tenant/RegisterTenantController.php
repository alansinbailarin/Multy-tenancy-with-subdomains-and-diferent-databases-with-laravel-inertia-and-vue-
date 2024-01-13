<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRegistrationRequest;
use App\Models\Tenant\Tenant;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterTenantController extends Controller
{
    public function create()
    {
        return inertia('Tenant/Register');
    }

    public function store(TenantRegistrationRequest $request)
    {
        $tenant = Tenant::create($request->validated());

        $tenant->createDomain(['domain' => $request->domain]);

        return Inertia::location(tenant_route($tenant->domains->first()->domain, 'tenant.login'));
    }
}
