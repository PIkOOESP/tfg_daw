<?php

namespace App\Enum;

enum IncidenciaStatus:string
{
    case AVERIADO = "AVERIADO";
    case MANTENIMIENTO = "MANTENIMIENTO";
    case ARREGLADO = "ARREGLADO";

    public static function values(){
        return array_column(self::cases(),"value");
    }
}
