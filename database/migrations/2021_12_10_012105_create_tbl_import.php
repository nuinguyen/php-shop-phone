<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import', function (Blueprint $table) {
            $table->Increments('import_id');
            $table->dateTime('import_date');
            $table->integer('user_id');
            $table->integer('provider_id');
            $table->string('import_total');
            $table->string('import_note');
            $table->integer('import_status');
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
        Schema::dropIfExists('tbl_import');
    }
}
