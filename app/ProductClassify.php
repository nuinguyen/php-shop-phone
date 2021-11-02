<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClassify extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_id','classify_id'
    ];
    protected $primaryKey = 'pro_class_id';
    protected $table = 'tbl_pro_class';
}
