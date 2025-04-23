<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{

    use HasFactory;

    protected $fillable = [
        'titulo',
        'mensaje',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'rol_destinatario',
        'color',
    ];
}
