<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->enum('status', ['pending', 'aktif', 'dikembalikan', 'ditolak', 'menunggu', 'selesai'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->enum('status', ['pending', 'aktif', 'dikembalikan', 'ditolak', 'menunggu'])->default('pending');
        });
    }
};
