<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Respuesta>
 */
class RespuestaFactory extends Factory
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
            'post_id' => Post::factory(),
            'user_id' => $usuarios->random()->id,
            'contenido' => $this->faker->paragraph,
            'fecha' => $this->faker->dateTimeThisYear(),
            'desactivado' => $this->faker->boolean(10),
        ];
    }
}
