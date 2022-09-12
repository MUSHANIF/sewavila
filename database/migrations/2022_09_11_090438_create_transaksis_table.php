<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();     
            $table->unsignedBigInteger('villaID');
            $table->unsignedBigInteger('pembeliID');
            $table->string('hari');
            $table->timestamps();
            $table->foreign('villaID')->references('id')->on('villas')->onDelete('cascade');
            $table->foreign('pembeliID')->references('id')->on('pembelis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
