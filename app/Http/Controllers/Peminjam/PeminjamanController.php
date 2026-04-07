<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);

        // dd($request->all()); // 🔥 Debugging: Pastikan variabel dan properti yang digunakan benar

        // Cek apakah user sudah memiliki peminjaman aktif
        $peminjamanAktif = Peminjaman::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'aktif', 'menunggu'])
            ->exists();

        if ($peminjamanAktif) {
            return redirect()->back()->with('error', 'Anda masih memiliki peminjaman aktif. Harap kembalikan buku terlebih dahulu sebelum meminjam buku baru.');
        }

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

        // Load informasi apakah user sudah memberi ulasan untuk setiap buku
        foreach ($peminjamans as $pinjam) {
            $review = Review::where('user_id', Auth::id())
                ->where('book_id', $pinjam->buku_id)
                ->first();

            $pinjam->sudahUlasan = $review ? true : false;
            $pinjam->userReview = $review; // Store the review data
        }

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

        if ($peminjaman->status !== 'aktif') {
            return back();
        }

        $peminjaman->update([
            'status' => 'menunggu'
        ]);

        return back()->with('success', 'Permintaan pengembalian dikirim');
    }

    public function requestKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->user_id != Auth::id()) {
            abort(403);
        }

        $peminjaman->status = 'menunggu';
        $peminjaman->save();

        return back()->with('success', 'Permintaan pengembalian dikirim');
    }

    public function generatePDF($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);

        // Pastikan user hanya bisa akses peminjaman miliknya sendiri
        if ($peminjaman->user_id != Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('peminjam.peminjaman.struk_pdf', compact('peminjaman'))
            ->setPaper('a4', 'portrait')
            ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('bukti-peminjaman-' . $peminjaman->nomor_peminjaman . '.pdf');
    }
}
