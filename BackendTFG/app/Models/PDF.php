<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PDF extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'datos_form',
        'ruta_pdf',
        'fecha_envio',
        'estado',
        'desactivado',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
