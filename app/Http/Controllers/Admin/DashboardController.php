<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\Book;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        $totalKategori = KategoriBuku::count();
        $totalUser = User::count();
        $totalStaff = staff::count();
        $totalAkun = $totalUser + $totalStaff;

        // Stats untuk sidebar
        $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count(); // User aktif dalam 30 hari terakhir
        $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
        $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();

        // Stats untuk dashboard cards
        $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        $dikembalikan = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
        $terlambat = Peminjaman::where('tanggal_pengembalian', '<', Carbon::today())
            ->whereIn('status', ['aktif', 'menunggu'])
            ->count();

        // Transaksi terbaru - ambil 10 transaksi terakhir
        $transaksiTerbaru = Peminjaman::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalStaff',
            'totalAkun',
            'totalBuku',
            'totalKategori',
            'userAktif',
            'pinjamHariIni',
            'totalPengembalian',
            'dipinjam',
            'dikembalikan',
            'terlambat',
            'transaksiTerbaru'
        ));
    }
}
