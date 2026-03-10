<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);

        $peminjaman = Peminjaman::create([
            'nomor_peminjaman' => 'PMJ-' . strtoupper(Str::random(6)),
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('buku.Formpinjam', $request->buku_id)
            ->with('success', 'Menunggu Persetujuan Petugas')
            ->with('peminjaman_id', $peminjaman->id); // 🔥 ini penting
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'disetujui';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui');
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'ditolak';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil ditolak');
    }

    public function riwayat()
    {
        $peminjamans = Peminjaman::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $aktif = $peminjamans->where('status', 'aktif');
        $dikembalikan = $peminjamans->where('status', 'dikembalikan');
        $ditolak = $peminjamans->where('status', 'ditolak');

        return view(
            'peminjam.peminjaman.riwayat',
            compact('peminjamans', 'aktif', 'dikembalikan', 'ditolak')
        );
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // hanya yang aktif boleh request pengembalian
        if ($peminjaman->status !== 'aktif') {
            return back()->with('error', 'Buku tidak bisa dikembalikan');
        }

        // ubah status jadi menunggu
        $peminjaman->update([
            'status' => 'pending'
        ]);

        return back()->with('success', 'Permintaan pengembalian dikirim, menunggu persetujuan petugas');
    }

    public function requestKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->user_id != Auth::id()) {
            abort(403);
        }

        $peminjaman->status = 'request_kembali';
        $peminjaman->save();

        return back()->with('success', 'Permintaan pengembalian dikirim');
    }
}
