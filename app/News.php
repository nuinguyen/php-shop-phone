<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'news_name', 'news_slug','news_desc','news_status'
    ];
    protected $primaryKey = 'news_id';
    protected $table = 'tbl_news';
}
