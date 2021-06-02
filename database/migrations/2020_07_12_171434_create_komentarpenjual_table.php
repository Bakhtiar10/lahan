<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarpenjualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentarpenjual', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_penjual')->unsigned(); 
            $table->text('content');
            $table->timestamps();

            $table -> foreign('id_penjual') -> references('id') -> on('users') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentarpenjual');
    }
}
