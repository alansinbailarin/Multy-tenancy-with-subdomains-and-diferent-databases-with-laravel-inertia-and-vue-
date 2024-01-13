<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Tenant\RegisterTenantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [IndexController::class, 'index']);

Route::group(['namespace' => 'Tenant', 'middleware' => ['web']], function () {
    Route::get('/register', [RegisterTenantController::class, 'create'])->name('tenant.register');
    Route::post('/register', [RegisterTenantController::class, 'store']);
});
