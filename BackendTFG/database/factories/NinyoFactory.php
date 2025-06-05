<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enums\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ninyo>
 */
class NinyoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuarios = User::all();

        return [
            'nombre' => $this->faker->firstName,
            'curso' => $this->faker->randomElement(Curso::values()),
            'numero_contacto' => $this->faker->phoneNumber,
            'nombre_padres' => $this->faker->name,
            'enfermedades_alergias' => $this->faker->boolean(30) ? $this->faker->sentence : null,
            'correo_id' => $usuarios->random()->email,
            'desactivado' => $this->faker->boolean(10),
        ];
    }
}
