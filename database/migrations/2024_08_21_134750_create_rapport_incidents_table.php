<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rapport_incidents', function (Blueprint $table) {
            $table->id();
            $table->date('date_incident');
            $table->time('heure_incident');
            $table->string('lieu_incident');
            $table->text('description_incident');
            $table->enum('gravite_incident', ['mineur', 'modéré', 'majeur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rapport_incidents');
    }
}
