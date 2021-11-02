<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'order_id','product_id','order_detail_amount'
    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'tbl_order_detail';

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
