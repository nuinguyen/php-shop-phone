<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'classify_value', 'classify_type'
    ];
    protected $primaryKey = 'classify_id';
    protected $table = 'tbl_classify';
}
