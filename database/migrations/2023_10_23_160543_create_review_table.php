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
        Schema::create('review', function (Blueprint $table) {
            $table->id('id_review'); // Auto-incrementing integer as primary key
            $table->string('taste');
            $table->integer('price');
            $table->binary('photo');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_newcocktail');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_users')->references('id')->on('users'); // Assuming 'id' is the primary key in the 'users' table.
            $table->foreign('id_newcocktail')->references('id_newcocktail')->on('newcocktail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};

