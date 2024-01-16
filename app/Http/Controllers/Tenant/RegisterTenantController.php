<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRegistrationRequest;
use App\Models\Tenant\Tenant;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Models\Tenant\Establishment;

class RegisterTenantController extends Controller
{
    public function create()
    {
        $types = Type::all();

        return inertia('Tenant/Register', [
            'types' => $types
        ]);
    }

    public function store(TenantRegistrationRequest $request)
    {
        $tenant = Tenant::create($request->validated());

        $tenant->createDomain(['domain' => $request->domain]);

        return Inertia::location(tenant_route($tenant->domains->first()->domain, 'tenant.login'));
    }
}
