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
            $table->unsignedBigInteger('villaid');
            $table->unsignedBigInteger('userid');
            $table->string('metode_pembayaran',20);
            $table->integer('total',40);
            $table->integer('kembalian',40);
            $table->string('hari',255);
            $table->timestamps();
            $table->foreign('villaid')->references('id')->on('villas')->onDelete('cascade');
            $table->foreign('userid')->references('id')->on('user')->onDelete('cascade');
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
