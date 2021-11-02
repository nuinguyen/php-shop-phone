<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
         'sale_name', 'sale_code','sale_condition','sale_number','sale_amount','sale_status','start_time','end_time'
    ];
    protected $primaryKey = 'sale_id';
    protected $table = 'tbl_sale';
}
