<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use softDeletes;

    protected $table = "producto";

    protected $dates = ['deleted_at']; 

    public function presentacion()
    {
        return $this->hasOne(Presentacion::class,'id','idpresentacion');
    }

    public function marca()
    {
        return $this->hasOne(Marca::class,'id','idmarca');
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','idcategoria');
    }

    public function compra()
    {
        return $this->hasOne(Compra::class,'idproducto','id');
    }
}
