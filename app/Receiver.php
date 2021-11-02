<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'receiver_name','receiver_address','receiver_phone','receiver_note'
    ];
    protected $primaryKey = 'receiver_id';
    protected $table = 'tbl_receiver';
}
