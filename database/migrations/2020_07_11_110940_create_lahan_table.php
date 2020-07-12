<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahan', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_penjual')->unsigned();
            $table->text('judul_lahan');
            $table->text('luas_lahan');
            $table->bigInteger('harga_lahan');
            $table->text('sertifikat');
            $table->char('no_hp', 15);
            $table->string('jenis_lahan');
            $table->text('alamat');
            $table->text('latitude');
            $table->text('longitude');
            $table->boolean('status_jual')->default(false);
            $table->boolean('status_lahan')->default(false);
            $table->timestamps();

            $table -> foreign('id_penjual') -> references('id') -> on('penjual') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lahan');
    }
}
