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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->string('category');
            $table->integer('stock');
            $table->string('isbn')->unique();
            $table->string('languange');
            $table->decimal('book_length', 5,2)->nullable();
            $table->decimal('book_weight', 5,2)->nullable();
            $table->decimal('book_width', 5,2)->nullable();
            $table->integer('number_of_books')->default(0);
            $table->year('publication_year');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
