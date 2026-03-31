<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'book'])
            ->latest()
            ->get();

        return view('admin.peminjaman.index', compact('peminjamans'));
    }
    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'pending') {
            return back()->with('error', 'Status tidak valid');
        }

        $peminjaman->update([
            'status' => 'aktif'
        ]);


        return back()->with('success', 'Peminjaman disetujui');
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'menunggu') {
            return back()->with('error', 'Status tidak valid');
        }

        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak');
    }


    public function tolakPengembalian(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|in:hilang,rusak,terlambat',
            'denda' => 'required|numeric|min:0'
        ], [
            'alasan.required' => 'Alasan penolakan harus dipilih',
            'alasan.in' => 'Alasan penolakan tidak valid',
            'denda.required' => 'Denda harus ditentukan',
            'denda.numeric' => 'Denda harus berupa angka',
            'denda.min' => 'Denda minimal 0'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'menunggu') {
            return back()->with('error', 'Status tidak valid');
        }

        // Validasi denda sesuai alasan
        $dendaMap = [
            'hilang' => 100000,
            'rusak' => 50000,
            'terlambat' => 10000
        ];

        $expectedDenda = $dendaMap[$request->alasan] ?? 0;
        $actualDenda = (int) $request->denda;

        if ($actualDenda !== $expectedDenda) {
            return back()->with('error', 'Denda tidak sesuai dengan alasan penolakan');
        }

        $peminjaman->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan,
            'denda' => $actualDenda
        ]);

        return back()->with('success', 'Pengembalian ditolak');
    }
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function pengembalian()
    {
        $pengembalians = Peminjaman::with(['user', 'book'])
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function approvePengembalian($id)
    {
        $peminjaman = Peminjaman::with('book')->findOrFail($id);

        if ($peminjaman->status !== 'menunggu') {
            return back()->with('error', 'Status tidak valid');
        }

        // tambah stok buku
        $peminjaman->book->increment('stock');

        $peminjaman->update([
            'status' => 'dikembalikan'
        ]);

        return back()->with('success', 'Pengembalian berhasil diproses');
    }

    public function konfirmasiDenda($id)
    {
        $peminjaman = Peminjaman::with('book')->findOrFail($id);

        $peminjaman->book->increment('stock');

        $peminjaman->update([
            'status' => 'selesai',
            'denda_dibayar' => true
        ]);

        return back()->with('success', 'Denda dikonfirmasi');
    }
}
