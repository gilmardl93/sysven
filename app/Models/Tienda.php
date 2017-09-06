<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tienda extends Model
{
    use softDeletes;

    protected $table = "tiendas";

    protected $dates = ['deleted_at'];
}
