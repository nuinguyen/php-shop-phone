<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_name', 'product_slug','category_id','provider_id','producer_id','product_summary','product_desc','product_price','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function albums()
    {
        return $this->hasMany(Albums::class);
    }
}
