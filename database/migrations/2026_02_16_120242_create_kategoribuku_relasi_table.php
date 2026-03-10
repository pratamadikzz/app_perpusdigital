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
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id('KategoriBukuID');

            $table->unsignedBigInteger('BukuID');
            $table->unsignedBigInteger('KategoriID');

            $table->foreign('BukuID')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');

            $table->foreign('KategoriID')
                ->references('KategoriID')
                ->on('kategoribuku')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
    }
};
