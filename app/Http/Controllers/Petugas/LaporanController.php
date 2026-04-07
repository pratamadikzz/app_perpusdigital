<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Staff;
use App\Models\Peminjaman;
use App\Models\KategoriBuku;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display the laporan dashboard
     */
    public function index()
    {
        // Statistik untuk dashboard
        $totalBuku = Book::count();
        $totalPeminjaman = Peminjaman::count();
        $totalPengembalian = Peminjaman::where('status', 'dikembalikan')->count();
        $bukuTersedia = Book::where('stock', '>', 0)->count();

        return view('petugas.laporan.index', compact(
            'totalBuku',
            'totalPeminjaman',
            'totalPengembalian',
            'bukuTersedia'
        ));
    }

    /**
     * Laporan Data Buku
     */
    public function buku()
    {
        $data = Book::all();
        $pdf = Pdf::loadView('petugas.laporan.buku', compact('data'));
        return $pdf->stream('laporan-data-buku-petugas.pdf');
    }

    /**
     * Laporan Data Peminjam / User
     */
    public function peminjam()
    {
        $data = User::all();
        $pdf = Pdf::loadView('petugas.laporan.peminjam', compact('data'));
        return $pdf->stream('laporan-data-peminjam-petugas.pdf');
    }

    /**
     * Laporan Data Petugas
     */
    public function petugas()
    {
        $data = Staff::all();
        $pdf = Pdf::loadView('petugas.laporan.petugas', compact('data'));
        return $pdf->stream('laporan-data-petugas-petugas.pdf');
    }

    /**
     * Laporan Data Peminjaman
     */
    public function peminjaman()
    {
        $data = Peminjaman::with(['user', 'book'])->latest()->get();
        $pdf = Pdf::loadView('petugas.laporan.peminjaman', compact('data'));
        return $pdf->stream('laporan-data-peminjaman-petugas.pdf');
    }

    /**
     * Laporan Data Pengembalian
     */
    public function pengembalian()
    {
        $data = Peminjaman::with(['user', 'book'])
            ->where('status', 'dikembalikan')
            ->latest()
            ->get();
        $pdf = Pdf::loadView('petugas.laporan.pengembalian', compact('data'));
        return $pdf->stream('laporan-data-pengembalian-petugas.pdf');
    }

    /**
     * Laporan Data Kategori
     */
    public function kategori()
    {
        $data = KategoriBuku::withCount('books')->get();
        $pdf = Pdf::loadView('petugas.laporan.kategori', compact('data'));
        return $pdf->stream('laporan-data-kategori-petugas.pdf');
    }
}