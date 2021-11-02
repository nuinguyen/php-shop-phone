<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_provider', function (Blueprint $table) {
            $table->increments('provider_id');
            $table->string('provider_name');
            $table->string('provider_code');
            $table->string('provider_email');
            $table->string('provider_phone');
            $table->string('provider_address');
            $table->text('provider_logo');
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
        Schema::dropIfExists('tbl_provider');
    }
}
