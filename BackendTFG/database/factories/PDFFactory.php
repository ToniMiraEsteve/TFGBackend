<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PDF>
 */
class PDFFactory extends Factory
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
            'datos_form' => json_encode([
                'campo1' => $this->faker->word,
                'campo2' => $this->faker->sentence,
                'campo3' => $this->faker->numberBetween(1, 100),
            ]),
            'ruta_pdf' => 'pdfs/' . $this->faker->uuid . '.pdf',
            'fecha_envio' => $this->faker->optional()->dateTimeThisYear(),
            'estado' => $this->faker->randomElement(['pendiente', 'enviado', 'fallido']),
            'desactivado' => $this->faker->boolean(10),
        ];
    }
}
