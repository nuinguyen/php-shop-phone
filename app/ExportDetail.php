<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportDetail extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_id','export_detail_amount','export_detail_price'
    ];
    protected $primaryKey = 'export_detail_id';
    protected $table = 'tbl_export_detail';
}
