<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'cart_id','cart_detail_amount','product_id'
    ];
//    protected $primaryKey = 'cart_id';
    protected $table = 'tbl_cart_detail';

}
