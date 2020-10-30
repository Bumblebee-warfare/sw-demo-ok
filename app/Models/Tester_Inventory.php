<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tester_Inventory extends Model
{
    protected $fillable =[  'TestInven_Id',
                            'TesterName',
                            'ProductName',
                            'ModelCCC',
                            'Operation',
                            'MasterRev',
                            'Quantity',
                            'TimeStamp',
                            'Platform'
                        ] ;
    protected $table='tb_tester_inventory';
}
