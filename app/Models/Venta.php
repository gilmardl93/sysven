<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Venta extends Model
{

    protected $table = "ventas";

    public function producto()
    {
        return $this->hasOne(Producto::class,'id','idproducto');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class,'id','idcliente');
    }

    public function scopeDisponible($cadenaSQL)
    {
        return $cadenaSQL->where('operacion','00000')
                        ->where('idusuario',Auth::user()->id);
    }
}
