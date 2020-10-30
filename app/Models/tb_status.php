<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_status extends Model
{
    protected $fillable =['id', 'status_name'] ;
    protected $table='tb_sw_status';
}