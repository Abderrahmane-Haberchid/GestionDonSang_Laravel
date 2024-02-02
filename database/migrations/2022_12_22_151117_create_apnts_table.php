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
        Schema::create('apnts', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->string('statut');
            $table->string('phone');
            $table->string('horaire');
            $table->string('jour');
            $table->string('mois');
            $table->string('etat');
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
        Schema::dropIfExists('apnts');
    }
};
