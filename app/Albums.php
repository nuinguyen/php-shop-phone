<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
         'albums_image','product_id'
    ];
    protected $primaryKey = 'albums_id';
    protected $table = 'tbl_albums';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
