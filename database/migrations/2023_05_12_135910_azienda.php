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
        Schema::create('Aziende', function (Blueprint $table) {
            $table->bigIncrements('idAzienda');
            $table->string('NomeAzienda',25)->unique();
            $table->string('Sede',25);
            $table->string('Tipologia',25);
            $table->string('RagioneSociale',25);
            $table->text('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Aziende');
    }
};
