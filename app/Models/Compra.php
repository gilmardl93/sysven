<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Compra extends Model
{
    use softDeletes;

    protected $table = "compras";

    protected $dates = ['deleted_at']; 

    public function producto()
    {
        return $this->hasOne(Producto::class,'id','idproducto');
    }

    public function tipo()
    {
        return $this->hasOne(Tipo::class,'id','idtipo');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class,'id','idpago');
    }

    public function scopeDisponible($cadenaSQL)
    {
        return $cadenaSQL->where('iduser',Auth::user()->id)
                        ->where('idtipo',null);
    }
}
