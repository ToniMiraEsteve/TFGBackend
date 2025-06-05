<?php

namespace App\Enums;

enum Curso: string
{
    case QuintoPrimaria = '5º Primaria';
    case SextoPrimaria = '6º Primaria';
    case PrimeroESO = '1º ESO';
    case SegundoESO = '2º ESO';
    case TerceroESO = '3º ESO';
    case CuartoESO = '4º ESO';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
