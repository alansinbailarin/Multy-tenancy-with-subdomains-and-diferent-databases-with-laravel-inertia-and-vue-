<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Establishment;
use App\Models\Tenant\Preferences;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $establishment = Establishment::where('domain', request()->getHost())->firstOrFail();
        $preferences = Preferences::where('establishment_id', $establishment->id)->firstOrFail();
        $team = User::all();

        return inertia('Tenant/Index', [
            'establishment' => $establishment,
            'preferences' => $preferences,
            'team' => $team,
        ]);
    }
}
