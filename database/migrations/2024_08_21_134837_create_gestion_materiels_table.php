<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gestion_materiels', function (Blueprint $table) {
            $table->id();
            $table->string('id_equipement')->unique();
            $table->string('nom_equipement');
            $table->enum('statut_equipement', ['en bon état', 'en réparation', 'hors service']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gestion_materiels');
    }
}
