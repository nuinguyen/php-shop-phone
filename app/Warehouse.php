<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public $timestamps = true; //set time to false
    protected $fillable = [
        'warehouse_month','warehouse_year','product_id','warehouse_sum_import','warehouse_sum_export','warehouse_sum_inventory'
    ];
    protected $primaryKey = 'warehouse_id';
    protected $table = 'tbl_warehouse';
}
