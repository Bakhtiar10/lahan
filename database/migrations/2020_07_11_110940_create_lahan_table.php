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
            $table->bigInteger('id_penjual')->unsigned();
            $table->string('judul_lahan', 100);
            $table->integer('luas_lahan');
            $table->bigInteger('harga_lahan');
            $table->string('sertifikat');
            $table->char('no_hp', 15);
            $table->string('jenis_lahan');
            $table->string('alamat',100);
            $table->string('kecamatan', 20);
            $table->text('latitude');
            $table->text('longitude');
            $table->boolean('status_jual')->default(false);
            $table->boolean('status_lahan')->default(false);
            $table->longText('deskripsi');
            $table->timestamps();

            $table -> foreign('id_penjual') -> references('id') -> on('users') -> onDelete('cascade')->onUpdate('cascade');
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
