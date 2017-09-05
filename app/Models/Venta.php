<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use softDeletes;

    protected $table = "ventas";

    protected $dates = ['deleted_at']; 
}