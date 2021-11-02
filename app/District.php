<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'district_name', 'district_type', 'city_id'
    ];
    protected $primaryKey = 'district_id';
    protected $table = 'tbl_district';
}
