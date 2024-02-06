<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\IndexController;
use App\Http\Controllers\Tenant\DashboardController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenant\LoginTenantController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('tenant.index');
    // Route::get('/', function () {
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });

    Route::get('/login', [LoginTenantController::class, 'create'])->middleware('guest')->name('tenant.login');
    Route::post('/login', [LoginTenantController::class, 'store'])->middleware('guest');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('tenant.dashboard');
});
