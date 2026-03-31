<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        $totalAnggota = User::count();
        $bukuDipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        $terlambat = Peminjaman::where('tanggal_pengembalian', '<', Carbon::now())
            ->whereIn('status', ['aktif', 'menunggu'])
            ->count();

        return view('petugas.dashboard', compact('totalBuku', 'totalAnggota', 'bukuDipinjam', 'terlambat'));
    }
}
