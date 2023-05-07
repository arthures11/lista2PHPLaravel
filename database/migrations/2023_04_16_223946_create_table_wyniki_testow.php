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
        Schema::create('table_wyniki_testow', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tytul');
            $table->integer('wynik')->nullable();
            $table->unsignedBigInteger('test_id');
            $table->boolean('inprogress')->default(true);
            $table->string('raport')->nullable();
            $table->timestamps();



              $table->foreign('user_id')
                   ->references('id')
                   ->on('users')
                   ->onDelete('cascade');

            $table->foreign('test_id')
                ->references('id')
                ->on('tests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_wyniki_testow');
    }
};
