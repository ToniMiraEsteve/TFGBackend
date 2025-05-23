<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Respuesta extends Model
{

    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'contenido',
        'fecha',
        'desactivado',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
