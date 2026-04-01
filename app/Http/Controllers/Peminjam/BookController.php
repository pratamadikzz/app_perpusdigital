<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books   = Book::with('category')
            ->withAvg('reviews', 'rating')
            ->get();
        return view('peminjam.index', compact('books'));
    }

    public function show(Book $book)
    {
        $book->load(['reviews' => function ($query) {
            $query->with('user')->latest();
        }]);

        // Hitung rata-rata rating dari collection review yang sudah di-load
        $rating = $book->reviews->isEmpty() ? 0 : $book->reviews->avg('rating');

        // Cek apakah user sudah memiliki peminjaman aktif
        $hasActiveLoan = false;
        if (Auth::check()) {
            $hasActiveLoan = Peminjaman::where('user_id', Auth::id())
                ->whereIn('status', ['pending', 'aktif', 'menunggu'])
                ->exists();
        }

        return view('peminjam.buku.detail', compact('book', 'rating', 'hasActiveLoan'));
    }
}
