<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use softDeletes;

    protected $table = "pago";

    protected $dates = ['deleted_at']; 
}
