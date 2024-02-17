<?php

namespace App\Http\Middleware;

use App\Models\Tenant\Establishment;
use App\Models\Tenant\Preferences;
use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\User;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $establishment = $request->user()
            ? $request->user()->establishments()->where('domain', $request->getHost())->first()
            : null;

        $preferences = $request->user() && $request->user()->establishment
            ? $request->user()->establishment->preferences
            : null;

        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? [
                    'id' => $request->user()->id,
                    'name' => $request->user()->name,
                    'surname' => $request->user()->surname,
                    'username' => $request->user()->username,
                    'slug' => $request->user()->slug,
                    'avatar' => $request->user()->avatar,
                    'description' => $request->user()->description,
                    'first_login' => $request->user()->first_login,
                    'email' => $request->user()->email,
                    'position' => $request->user()->position,
                    'establishments' => $request->user()->establishments,
                ]
                : null,
            'establishment' => $establishment,
            'preferences' => $preferences,

        ]);
    }
}
