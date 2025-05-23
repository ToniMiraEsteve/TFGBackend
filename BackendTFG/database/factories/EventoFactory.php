<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\Rol;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha = $this->faker->date();
        $horaInicio = $this->faker->time();
        $horaFin = date('H:i:s', strtotime($horaInicio) + rand(3600, 7200));

        return [
            'titulo' => $this->faker->sentence(3),
            'mensaje' => $this->faker->paragraph,
            'fecha' => $fecha,
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'rol_destinatario' => $this->faker->randomElement(Rol::values()),           
            'color' => $this->faker->hexColor,
        ];
    }
}
