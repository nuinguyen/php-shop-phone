<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'export_date','user_id','export_total','export_note','export_status'
    ];
    protected $primaryKey = 'export_id';
    protected $table = 'tbl_export';
}
