<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_lahan')->unsigned();
            $table->Integer('id_penjual')->unsigned();
            // $table->Integer('id_pembeli')->unsigned();
            // $table->longText('foto_ktp')->nullable();
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
        Schema::dropIfExists('sold_outs');
    }
}
