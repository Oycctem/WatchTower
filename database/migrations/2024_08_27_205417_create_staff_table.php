<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('cin', 50)->unique();  // National Identity Card number
            $table->string('passport', 50)->unique()->nullable();  // Passport number (optional)
            $table->string('position', 100);
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('city_id')->nullable();  // Foreign key for city
            $table->unsignedBigInteger('etablissement_id')->nullable();  // Foreign key for etablissement
            $table->enum('status', ['active', 'inactive']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('phone_number_one', 15);
            $table->string('phone_number_two', 15)->nullable();  // Secondary phone number (optional)
            $table->string('picture', 255)->nullable();  // Path to the profile picture
            $table->integer('age')->nullable();  // Age of the staff member
            $table->enum('sexe', ['male', 'female', 'other']);
            $table->string('clothes_size', 10)->nullable();  // Clothes size (e.g., S, M, L, XL)
            $table->string('boots_size', 5)->nullable();  // Boots size (e.g., 42, 43)
            $table->string('badge_id', 50)->unique();
            $table->string('driver_license', 50)->unique()->nullable();  // Driver's license number (optional)
            $table->timestamps();  // created_at and updated_at columns

            // Foreign key constraints
            $table->foreign('region_id')->references('id')->on('regions')->constrained()->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->constrained()->onDelete('set null');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
