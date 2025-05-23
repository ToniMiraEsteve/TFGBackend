<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario admin predeterminado
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'email_verified_at' => now(),
            'rol' => 'admin',
            'email' => 'admin@example.com',
        ]);

        // 9 usuarios adicionales
        User::factory(9)->create();
    }
}
