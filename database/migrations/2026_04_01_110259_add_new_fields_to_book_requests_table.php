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
        Schema::table('book_requests', function (Blueprint $table) {
            $table->dropForeign(['KategoriID']);
            $table->dropColumn('KategoriID');
            $table->string('category')->nullable()->after('action');
            $table->string('isbn')->nullable()->after('publisher');
            $table->string('languange')->nullable()->after('isbn');
            $table->integer('book_length')->nullable()->after('languange');
            $table->integer('book_weight')->nullable()->after('book_length');
            $table->integer('book_width')->nullable()->after('book_weight');
            $table->integer('number_of_books')->nullable()->after('book_width');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_requests', function (Blueprint $table) {
            $table->dropColumn(['category', 'isbn', 'languange', 'book_length', 'book_weight', 'book_width', 'number_of_books']);
            $table->unsignedBigInteger('KategoriID')->after('book_id');
            $table->foreign('KategoriID')
                ->references('KategoriID')
                ->on('kategoribuku')
                ->onDelete('cascade');
        });
    }
};
