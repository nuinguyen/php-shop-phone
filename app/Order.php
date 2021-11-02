<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'order_total','order_ship','order_sale','order_method','user_id','receiver_id'
    ];
    protected $primaryKey = 'oder_id';
    protected $table = 'tbl_order';
}
