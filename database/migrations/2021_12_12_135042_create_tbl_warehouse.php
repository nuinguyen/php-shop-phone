<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_warehouse', function (Blueprint $table) {
            $table->Increments('warehouse_id');
            $table->integer('warehouse_month');
            $table->integer('warehouse_year');
            $table->integer('product_id');
            $table->integer('warehouse_sum_import');
            $table->integer('warehouse_sum_export');
            $table->integer('warehouse_sum_inventory');
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
        Schema::dropIfExists('tbl_warehouse');
    }
}
