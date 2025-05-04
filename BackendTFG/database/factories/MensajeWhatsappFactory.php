<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MensajeWhatsapp>
 */
class MensajeWhatsappFactory extends Factory
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
            'numero_destino' => $this->faker->e164PhoneNumber,
            'mensaje' => $this->faker->text(100),
            'fecha_envio' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'estado' => $this->faker->randomElement(['pendiente', 'enviado', 'fallido']),
            'respuesta' => $this->faker->boolean(70) ? $this->faker->text(80) : null,
            'desactivado' => $this->faker->boolean(10),
        ];
    }
}
