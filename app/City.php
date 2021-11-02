<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'city_name', 'city_type'
    ];
    protected $primaryKey = 'city_id';
    protected $table = 'tbl_city';
}
