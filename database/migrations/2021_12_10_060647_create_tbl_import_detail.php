<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImportDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import_detail', function (Blueprint $table) {
            $table->integer('import_detail_id');
            $table->integer('product_id');
            $table->integer('import_detail_amount');
            $table->integer('import_detail_price');
            $table->timestamps();
            $table->primary(array('import_detail_id', 'product_id'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_import_detail');
    }
}
