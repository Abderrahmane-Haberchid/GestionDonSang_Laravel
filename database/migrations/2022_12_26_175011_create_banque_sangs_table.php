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
        Schema::create('banque_sangs', function (Blueprint $table) {
            $table->id();
            $table->integer('qte');
            $table->string('gp');
            $table->integer('iduser');
            $table->string('etat');
            $table->integer('idrdv');
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
        Schema::dropIfExists('banque_sangs');
    }
};
