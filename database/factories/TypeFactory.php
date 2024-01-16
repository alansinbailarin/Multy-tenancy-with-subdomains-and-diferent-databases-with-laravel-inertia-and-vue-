<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Barbershop', 'Salon', 'Nail Studio', 'Spa', 'Massage Studio', 'Tattoo Studio']),
            'description' => fake()->sentence(10),
            'svg_icon_path' => fake()->randomElement(['barbershop.svg', 'salon.svg', 'spa.svg'])
        ];
    }
}
