<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('newcocktail', function (Blueprint $table) {
            $table->id('id_newcocktail'); // Auto-incrementing integer as primary key
            $table->string('name', 255);
            $table->integer('price');
            $table->integer('amount');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_equipment');
            $table->unsignedBigInteger('id_ingredients');
            $table->timestamps();
            
            // Define foreign key constraints
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_equipment')->references('id_equipment')->on('equipment');
            $table->foreign('id_ingredients')->references('id_ingredients')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newcocktail');
    }
};


