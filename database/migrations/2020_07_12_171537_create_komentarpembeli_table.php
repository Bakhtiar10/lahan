<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarpembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentarpembeli', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_pembeli')->unsigned(); 
            $table->text('content');
            $table->timestamps();

            $table -> foreign('id_pembeli') -> references('id') -> on('pembeli') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentarpembeli');
    }
}
