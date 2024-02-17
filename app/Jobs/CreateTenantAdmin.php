<?php

namespace App\Jobs;

use App\Models\Tenant\Establishment;
use App\Models\Tenant\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTenantAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Tenant $tenant)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function ($tenant) {
            // Crear el TenantUser
            $userData = $tenant->only('name', 'surname', 'email', 'password', 'type_id');
            $userData['username'] = $this->generateUsername($tenant->name, $tenant->surname);
            $userData['slug'] = $this->generateSlug($tenant->name, $tenant->surname);
            $userData['position'] = 'Owner';
            $userData['first_login'] = true;

            $tenantUser = User::create($userData);

            // Crear el Establishment asociado al Tenant
            $establishmentData = [
                'name' => $tenant->company,
                'domain' => $tenant->domain, // Ajusta según tus necesidades
                'type_id' => $tenant->type_id, // Ajusta según tus necesidades
                'user_id' => $tenantUser->id, // Relacionar con el ID del TenantUser recién creado
                'tenant_id' => $tenant->id, // Relacionar con el ID del Tenant
            ];

            $establishment = Establishment::create($establishmentData);

            $preferences = [
                'establishment_id' => $establishment->id,
            ];

            $establishment->preferences()->create($preferences);
        });
    }

    /**
     * Generate a username based on name and surname.
     */
    private function generateUsername($name, $surname): string
    {
        $username = $name . $surname;
        $username = strtolower(str_replace(' ', '', $username));

        return $username;
    }

    private function generateSlug($name, $surname): string
    {
        $slug = $name . $surname;
        $slug = strtolower(str_replace(' ', '', $slug));

        return $slug;
    }
}
