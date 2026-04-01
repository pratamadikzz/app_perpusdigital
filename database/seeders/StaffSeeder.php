<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@perpustakaan.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'Kantor Admin',
            'role' => 'admin',
        ]);

        Staff::create([
            'name' => 'Petugas Buku',
            'username' => 'petugas',
            'email' => 'petugas@perpustakaan.com',
            'password' => Hash::make('petugas123'),
            'alamat' => 'Ruang Petugas',
            'role' => 'petugas',
        ]);
    }
}