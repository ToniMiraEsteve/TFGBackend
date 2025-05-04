<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PDF;

class PDFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PDF::factory(10)->create();
    }
}
