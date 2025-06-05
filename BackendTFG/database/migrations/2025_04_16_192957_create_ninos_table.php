<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ninyos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('curso');
            $table->string('numero_contacto');
            $table->string('nombre_padres');
            $table->text('enfermedades_alergias')->nullable();
            $table->string('correo_id')->nullable();
            $table->boolean('desactivado')->default(false);
            $table->timestamps();

            $table->foreign('correo_id')->references('email')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninyos');
    }
};
