<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'city_id','district_id','village_id','ship_feeship'
    ];
    protected $primaryKey = 'ship_id';
    protected $table = 'tbl_ship';
    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }
    public function district(){
        return $this->belongsTo('App\District', 'district_id');
    }
    public function village(){
        return $this->belongsTo('App\Village', 'village_id');
    }

}
