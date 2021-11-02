<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'user_id'
    ];
    protected $primaryKey = 'cart_id';
    protected $table = 'tbl_cart';

}
