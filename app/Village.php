<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'village_name', 'village_type', 'district_id'
    ];
    protected $primaryKey = 'village_id';
    protected $table = 'tbl_village';
}
