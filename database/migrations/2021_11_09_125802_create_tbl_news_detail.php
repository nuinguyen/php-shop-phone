<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNewsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news_detail', function (Blueprint $table) {
            $table->Increments('news_detail_id');
            $table->integer('news_id');
            $table->string('news_detail_name');
            $table->string('news_detail_slug');
            $table->string('news_detail_image');
            $table->text('news_detail_summary');
            $table->text('news_detail_desc');
            $table->integer('news_detail_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_news_detail');
    }
}
