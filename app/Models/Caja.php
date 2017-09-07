<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Caja extends Model
{
    protected $table = "caja";

    public function scopeAperturaAbierta($cadenaSQL)
    {
        return $cadenaSQL->where('idusuario',Auth::user()->id)
                        ->where('hora_cierre',NULL);
    }
}
