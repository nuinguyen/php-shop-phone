<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'news_detail_name', 'news_id','news_detail_slug','news_detail_image','news_detail_summary','news_detail_desc','news_detail_status'
    ];
    protected $primaryKey = 'news_detail_id';
    protected $table = 'tbl_news_detail';
}
