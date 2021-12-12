<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_export', function (Blueprint $table) {
                $table->Increments('export_id');
                $table->dateTime('export_date');
                $table->integer('user_id');
                $table->string('export_total');
                $table->string('export_note');
                $table->integer('export_status');
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
        Schema::dropIfExists('tbl_export');
    }
}
