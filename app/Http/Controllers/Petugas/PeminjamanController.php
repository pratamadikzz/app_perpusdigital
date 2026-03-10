<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])
            ->latest()
            ->get();

        return view('petugas.peminjaman.index', compact('peminjamans'));
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        // Cegah double approve
        if ($peminjaman->status !== 'pending') {
            return back()->with('error', 'Sudah diproses sebelumnya');
        }

        // Cek stok
        if ($peminjaman->buku->stock <= 0) {
            return back()->with('error', 'Stok buku habis!');
        }

        // Kurangi stok 1
        $peminjaman->buku->decrement('stock');

        // Update status
        $peminjaman->update([
            'status' => 'aktif'
        ]);

        return back()->with('success', 'Peminjaman disetujui & stok dikurangi');
    }


    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'pending') {
            return back()->with('error', 'Sudah diproses');
        }

        $peminjaman->update(['status' => 'ditolak']);

        return back()->with('success', 'Peminjaman ditolak');
    }
}
