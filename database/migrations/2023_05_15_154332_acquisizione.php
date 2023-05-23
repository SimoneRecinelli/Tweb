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
        Schema::create('Acquisizione', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Username', 25);
            $table->bigInteger('Codice_coupon')->unsigned();
            $table->timestamps();

            $table->foreign('Username')->references('Username')->on('Users');
            $table->foreign('Codice_coupon')->references('Codice_coupon')->on('Coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Acquisizione');
    }
};
