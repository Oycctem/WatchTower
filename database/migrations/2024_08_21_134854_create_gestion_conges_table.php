<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionCongesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gestion_conges', function (Blueprint $table) {
            $table->id();
            $table->string('nom_agent');
            $table->date('debut_conge');
            $table->date('fin_conge');
            $table->text('raison_conge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gestion_conges');
    }
}
