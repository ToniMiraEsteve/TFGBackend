<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'user_id' => $usuarios->random()->id,
            'fecha' => $this->faker->dateTimeThisYear(),
            'contenido' => $this->faker->paragraph,
            'visibilidad' => $this->faker->randomElement(['activo', 'inactivo']),
            'desactivado' => $this->faker->boolean(10),
        ];
    }
}
