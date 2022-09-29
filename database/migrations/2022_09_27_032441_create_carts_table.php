<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('villaid');
            $table->unsignedBigInteger('userid');
            $table->string('name',50);   
            $table->integer('jumlah');
            $table->integer('stok');
            $table->string('jenis',50); 
            $table->timestamp('tanggal');
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('villaid')->references('id')->on('villas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
