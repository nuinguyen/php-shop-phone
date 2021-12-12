<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExportDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_export_detail', function (Blueprint $table) {
            $table->integer('export_detail_id');
            $table->integer('product_id');
            $table->integer('export_detail_amount');
            $table->integer('export_detail_price');
            $table->timestamps();
            $table->primary(array('export_detail_id', 'product_id'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_export_detail');
    }
}
