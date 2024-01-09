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
        Schema::create('process', function (Blueprint $table) {
            $table->id('id_process'); // Auto-incrementing integer as primary key
            $table->unsignedBigInteger('id_ingredients');
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('id_newcocktail');
            $table->string('order');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_ingredients')->references('id_ingredients')->on('ingredients');
            $table->foreign('id_item')->references('id_item')->on('item');
            $table->foreign('id_newcocktail')->references('id_newcocktail')->on('newcocktail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process');
    }
};

