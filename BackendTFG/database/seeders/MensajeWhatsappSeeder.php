<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MensajeWhatsapp;

class MensajeWhatsappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MensajeWhatsapp::factory(10)->create();
    }
}
