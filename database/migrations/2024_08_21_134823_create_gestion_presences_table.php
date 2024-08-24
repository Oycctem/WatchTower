<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionPresencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gestion_presences', function (Blueprint $table) {
            $table->id();
            $table->string('nom_agent');
            $table->date('date_presence');
            $table->enum('statut_presence', ['présent', 'absent', 'retard']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gestion_presences');
    }
}
