<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_product extends Model
{
    protected $fillable =[  'product_name',
                            'product_family',
                            'product_owner',
                            'emp_id',
                            'timestamp'
                        ] ;
    protected $table='tb_products';
}