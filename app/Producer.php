<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'producer_name', 'producer_slug','producer_code','producer_email','producer_phone','producer_address','producer_logo'
    ];
    protected $primaryKey = 'producer_id';
    protected $table = 'tbl_producer';
}
