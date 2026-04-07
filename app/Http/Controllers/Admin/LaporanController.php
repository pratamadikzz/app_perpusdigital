<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Staff;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Halaman Laporan
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    /**
     * Laporan Data Buku - PDF
     */
    public function buku()
    {
        $data = Book::all();
        $pdf = Pdf::loadView('admin.laporan.buku', compact('data'));
        return $pdf->stream('laporan-data-buku.pdf');
    }

    /**
     * Laporan Data Peminjam / User - PDF
     */
    public function peminjam()
    {
        $data = User::all();
        $pdf = Pdf::loadView('admin.laporan.peminjam', compact('data'));
        return $pdf->stream('laporan-data-peminjam.pdf');
    }

    /**
     * Laporan Data Petugas - PDF
     */
    public function petugas()
    {
        $data = Staff::all();
        $pdf = Pdf::loadView('admin.laporan.petugas', compact('data'));
        return $pdf->stream('laporan-data-petugas.pdf');
    }

    /**
     * Laporan Data Peminjaman - PDF
     */
    public function peminjaman()
    {
        $data = Peminjaman::with(['user', 'book'])->latest()->get();
        $pdf = Pdf::loadView('admin.laporan.peminjaman', compact('data'));
        return $pdf->stream('laporan-data-peminjaman.pdf');
    }

    /**
     * Laporan Data Pengembalian - PDF
     */
    public function pengembalian()
    {
        $data = Peminjaman::with(['user', 'book'])
            ->where('status', 'dikembalikan')
            ->latest()
            ->get();
        $pdf = Pdf::loadView('admin.laporan.pengembalian', compact('data'));
        return $pdf->stream('laporan-data-pengembalian.pdf');
    }
}
