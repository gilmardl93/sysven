<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provedor extends Model
{
    use softDeletes;

    protected $table = "provedor";

    protected $dates = ['deleted_at']; 
}
