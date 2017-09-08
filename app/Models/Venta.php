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

    public function pago()
    {
        return $this->hasOne(Pago::class,'id','idpago');
    }

    public function scopeDisponible($cadenaSQL)
    {
        return $cadenaSQL->where('numero','00000')
                        ->where('idusuario',Auth::user()->id);
    }

    public function scopeProductoExiste($cadenaSQL, $producto)
    {
        return $cadenaSQL->where('numero','00000')
                        ->where('idproducto',$producto)
                        ->where('idusuario',Auth::user()->id);
    }

    public function scopeExisteBoleta($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('numero',$numero)
                        ->where('idtipo',1);
    }

    public function scopeExisteFactura($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('numero',$numero)
                        ->where('idtipo',2);
    }

    public function scopeExisteTicket($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('numero',$numero)
                        ->where('idtipo',3);
    }

    public function scopeUltimaSerieBoleta($cadenaSQL)
    {
        return $cadenaSQL->where('idtipo',1)
                        ->where('idusuario',Auth::user()->id);
    }

    public function scopeDetalleSerieBoleta($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('idtipo',1)
                        ->where('numero',$numero);
    }

    public function scopeUltimaSerieFactura($cadenaSQL)
    {
        return $cadenaSQL->where('idtipo',2)
                        ->where('idusuario',Auth::user()->id);
    }

    public function scopeDetalleSerieFactura($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('idtipo',2)
                        ->where('numero',$numero);
    }

    public function scopeUltimaSerieTicket($cadenaSQL)
    {
        return $cadenaSQL->where('idtipo',3)
                        ->where('idusuario',Auth::user()->id);
    }

    public function scopeDetalleSerieTicket($cadenaSQL, $numero)
    {
        return $cadenaSQL->where('idtipo',3)
                        ->where('numero',$numero);
    }
}
