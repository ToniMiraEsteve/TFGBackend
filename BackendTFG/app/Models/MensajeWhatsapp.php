<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MensajeWhatsapp extends Model
{

    use HasFactory;

    protected $table = 'mensajes_whatsapp';

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
        return $this->belongsTo(User::class, 'user_id');
    }
}
