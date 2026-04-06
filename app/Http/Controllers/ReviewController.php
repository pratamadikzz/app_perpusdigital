<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:1000',
        ]);

        $peminjaman = Peminjaman::where('user_id', Auth::id())
            ->where('buku_id', $request->book_id)
            ->whereIn('status', ['dikembalikan', 'selesai'])
            ->latest()
            ->first();

        if (!$peminjaman) {
            return redirect()->route('peminjam.riwayat')->with('error', 'Anda belum menyelesaikan peminjaman untuk buku ini.');
        }

        // Cek apakah user sudah pernah memberikan ulasan untuk buku ini
        $existingReview = Review::where('user_id', Auth::id())
            ->where('book_id', $request->book_id)
            ->first();

        if ($existingReview) {
            return redirect()->route('peminjam.riwayat')->with('error', 'Anda sudah memberi ulasan untuk buku ini.');
        }

        // Untuk sementara, izinkan ulasan tanpa cek denda dulu
        // if ($peminjaman->denda > 0 && !$peminjaman->denda_dibayar) {
        //     return back()->with('error', 'Harap selesaikan denda terlebih dahulu sebelum memberikan ulasan.');
        // }

        try {
            Review::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'rating' => $request->rating,
                'ulasan' => $request->ulasan
            ]);

            return redirect()->route('peminjam.riwayat')->with('success', 'Terima kasih atas ulasan anda');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle unique constraint violation (fallback)
            if ($e->getCode() == 23000) {
                return redirect()->route('peminjam.riwayat')->with('error', 'Anda sudah memberi ulasan untuk buku ini.');
            }

            // Handle other database errors
            return redirect()->route('peminjam.riwayat')->with('error', 'Terjadi kesalahan saat menyimpan ulasan.');
        }
    }
}
