<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProducer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_producer', function (Blueprint $table) {
            $table->increments('producer_id');
            $table->string('producer_name');
            $table->string('producer_slug');
            $table->string('producer_code');
            $table->string('producer_email');
            $table->string('producer_phone');
            $table->string('producer_address');
            $table->text('producer_logo');
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
        Schema::dropIfExists('tbl_producer');
    }
}
