<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'import_date','user_id','provider_id','import_total','import_note','import_status'
    ];
    protected $primaryKey = 'import_id';
    protected $table = 'tbl_import';
}
