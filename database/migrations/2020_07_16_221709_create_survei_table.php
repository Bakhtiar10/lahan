<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_lahan')->unsigned();
            $table->date('tanggal');
            $table->time('waktu');
            $table->Integer('id_pembeli')->unsigned();
            $table->longText('foto_ktp')->nullable();
            $table->char('no_hp', 15);
            $table->boolean('status_survei')->default(false);
            $table->boolean('status_pesan')->default(false);
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
        Schema::dropIfExists('survei');
    }
}
