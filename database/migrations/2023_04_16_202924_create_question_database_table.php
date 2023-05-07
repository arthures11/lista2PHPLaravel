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
        Schema::create('question_database', function (Blueprint $table) {
            $table->id();
            $table->string('pytanie');
            $table->string('odp1');
            $table->string('odp2');
            $table->string('odp3');
            $table->integer('prawidlowa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_database');
    }
};
