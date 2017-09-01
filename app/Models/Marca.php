<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use softDeletes;

    protected $table = "marca";

    protected $dates = ['deleted_at']; 
}
