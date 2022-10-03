<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jnsID');
            $table->string('name');
            $table->string('harga');
            $table->string('stok');
            $table->string('image');
            $table->string('deskripsi');
            $table->timestamps();
            $table->foreign('jnsID')->references('id')->on('jnsvillas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villas');
    }
}
