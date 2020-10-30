<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_member extends Model
{
    protected $fillable =[  'emp_id',
                            'emp_name',
                            'emp_email',
                            'emp_dept',
                            'emp_picture',
                            'emp_password'
                        ] ;
    protected $table='tb_members';
}
