<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGestionAccesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gestion_acces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade'); // Replace nom_agent with staff_id foreign key
            $table->date('date_acces');
            $table->time('heure_acces');
            $table->string('lieu_acces');
            $table->enum('type_acces', ['entrée', 'sortie']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gestion_acces');
    }
}
