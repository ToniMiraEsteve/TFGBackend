<?php

namespace App\Enums;

enum Rol: String
{
    case Admin = 'admin';
    case Junta = 'junta';
    case Monitor = 'monitor';
    case Usuario = 'usuario';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
