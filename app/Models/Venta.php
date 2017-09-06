<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Venta extends Model
{
    use softDeletes;

    protected $table = "ventas";

    protected $dates = ['deleted_at']; 

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
        return $cadenaSQL->where('numero','00000')
                        ->where('idusuario',Auth::user()->id);
    }
}
