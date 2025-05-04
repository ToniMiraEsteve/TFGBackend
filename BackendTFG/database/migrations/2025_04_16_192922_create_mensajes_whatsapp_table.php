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
        Schema::create('mensajes_whatsapp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('numero_destino');
            $table->text('mensaje');
            $table->timestamp('fecha_envio')->nullable();
            $table->enum('estado', ['pendiente', 'enviado', 'fallido'])->default('pendiente');
            $table->text('respuesta')->nullable();
            $table->boolean('desactivado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes_whatsapp');
    }
};
