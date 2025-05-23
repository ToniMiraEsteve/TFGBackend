<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ninyo extends Model
{

    use HasFactory;

    protected $fillable = [
        'nombre',
        'curso',
        'ubicacion_sip',
        'ubicacion_fotos',
        'numero_contacto',
        'nombre_padres',
        'enfermedades_alergias',
        'correo_id',
        'desactivado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'correo_id', 'email');
    }
}
