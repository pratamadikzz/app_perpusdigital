<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        // Fetch all peminjamans yang memiliki alasan/denda atau status tertentu (history pengembalian)
        $allRiwayat = Peminjaman::with('book', 'user')
            ->whereIn('status', ['menunggu', 'dikembalikan', 'selesai'])
            ->latest()
            ->get();

        // Pisahkan pengembalian normal (menunggu approval) dan riwayat lengkap
        $pengembalianMenunggu = $allRiwayat->filter(function ($item) {
            return $item->status === 'menunggu' && is_null($item->alasan_penolakan);
        })->values();

        $pengembalianDitolakMenunggu = $allRiwayat->filter(function ($item) {
            return $item->status === 'menunggu' && !is_null($item->alasan_penolakan);
        })->values();

        $riwayatSelesai = $allRiwayat->filter(function ($item) {
            return in_array($item->status, ['dikembalikan', 'selesai']);
        })->values();

        return view('petugas.pengembalian.index', compact('pengembalianMenunggu', 'pengembalianDitolakMenunggu', 'riwayatSelesai'));
    }

    public function approve($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if ($pinjam->status !== 'menunggu') {
            return back()->with('error', 'Status tidak valid');
        }

        // Jika ada alasan penolakan, ubah status menjadi selesai (penolakan sudah selesai/diselesaikan)
        if ($pinjam->alasan_penolakan) {
            $pinjam->status = 'selesai';
            $pinjam->save();
            return back()->with('success', 'Penolakan buku selesai disetujui');
        }

        // Jika tidak ada alasan (pengembalian normal), ubah status menjadi dikembalikan
        $pinjam->status = 'dikembalikan';
        $pinjam->save();

        $book = Book::find($pinjam->buku_id);
        if ($book) {
            $book->increment('stock');
        }

        return back()->with('success', 'Pengembalian buku disetujui');
    }

    public function tolak(Request $request, $id)
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
            'status' => 'menunggu',
            'alasan_penolakan' => $request->alasan,
            'denda' => $actualDenda
        ]);

        return back()->with('success', 'Pengembalian ditolak. Menunggu peminjam bertanggung jawab');
    }
}
