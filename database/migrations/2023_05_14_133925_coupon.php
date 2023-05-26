<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Coupons', function (Blueprint $table) {
            $table->bigIncrements('Codice_coupon');
            $table->string('Combinazione');
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('idOfferta')->nullable();
            $table->foreign('idOfferta')->references('idOfferta')->on('Offerte')->onDelete('set null');
            $table->string('codice')->unique();
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
        Schema::dropIfExists('Coupons');
        
    }
};
