<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use softDeletes;

    protected $table = "tipo";

    protected $dates = ['deleted_at']; 
}
