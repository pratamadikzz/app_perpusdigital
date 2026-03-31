<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

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

        return view('peminjam.buku.detail', compact('book', 'rating'));
    }
}
