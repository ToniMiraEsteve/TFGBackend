<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MensajeWhatsapp extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'numero_destino',
        'mensaje',
        'fecha_envio',
        'estado',
        'respuesta',
        'desactivado',
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
