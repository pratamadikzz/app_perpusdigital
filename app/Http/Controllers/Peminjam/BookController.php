<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books   = Book::with('category')->get();
        return view('peminjam.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('peminjam.buku.detail', compact('book'));
    }
}
