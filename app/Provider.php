<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'provider_name','provider_code','provider_email','provider_phone','provider_address','provider_logo'
    ];
    protected $primaryKey = 'provider_id';
    protected $table = 'tbl_provider';
}
