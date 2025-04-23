<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'contenido',
        'visibilidad',
        'desactivado',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
