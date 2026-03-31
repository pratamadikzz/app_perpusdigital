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
        // MySQL: Alter enum column to include 'selesai'
        DB::statement("ALTER TABLE peminjamans MODIFY COLUMN status ENUM('pending', 'aktif', 'dikembalikan', 'ditolak', 'menunggu', 'selesai') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // MySQL: Revert to original enum
        DB::statement("ALTER TABLE peminjamans MODIFY COLUMN status ENUM('pending', 'aktif', 'dikembalikan', 'ditolak', 'menunggu') DEFAULT 'pending'");
    }
};
