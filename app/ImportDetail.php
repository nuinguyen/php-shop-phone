<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_id','import_detail_amount','import_detail_price'
    ];
    protected $primaryKey = 'import_detail_id';
    protected $table = 'tbl_import_detail';
}
