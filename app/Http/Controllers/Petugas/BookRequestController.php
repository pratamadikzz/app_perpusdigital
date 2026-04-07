<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Book;
use App\Models\KategoriBuku;

class BookRequestController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        $bookRequests = BookRequest::where('status', 'pending')->latest()->get();
        $kategori = KategoriBuku::all();
        return view('petugas.dataBuku.index', compact('books', 'kategori', 'bookRequests'));
    }

    // =========================
    // STORE (AJUKAN TAMBAH)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category' => 'required|array|min:1',
            'category.*' => 'required|exists:kategoribuku,KategoriID',
            'stock' => 'required|numeric',
            'isbn' => 'nullable',
            'languange' => 'nullable',
            'book_length' => 'nullable|numeric',
            'book_weight' => 'nullable|numeric',
            'book_width' => 'nullable|numeric',
            'number_of_books' => 'nullable|numeric',
            'publication_year' => 'required|numeric',
            'description' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('books', 'public');
        }

        $kategoriNames = KategoriBuku::whereIn('KategoriID', $request->category)
            ->pluck('NamaKategori')
            ->toArray();

        BookRequest::create([
            'action' => 'create',
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'category' => implode(', ', $kategoriNames),
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'languange' => $request->languange,
            'book_length' => $request->book_length,
            'book_weight' => $request->book_weight,
            'book_width' => $request->book_width,
            'number_of_books' => $request->number_of_books,
            'publication_year' => $request->publication_year,
            'description' => $request->description,
            'cover' => $coverPath,
            'status' => 'pending'
        ]);


        return back()->with('success', 'Menunggu persetujuan admin');
    }

    // =========================
    // UPDATE (AJUKAN EDIT)
    // =========================
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category' => 'required|array|min:1',
            'category.*' => 'required|exists:kategoribuku,KategoriID',
            'stock' => 'required|numeric',
            'isbn' => 'nullable',
            'languange' => 'nullable',
            'book_length' => 'nullable|numeric',
            'book_weight' => 'nullable|numeric',
            'book_width' => 'nullable|numeric',
            'number_of_books' => 'nullable|numeric',
            'publication_year' => 'required|numeric',
            'description' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('books', 'public');
        }

        $kategoriNames = KategoriBuku::whereIn('KategoriID', $request->category)
            ->pluck('NamaKategori')
            ->toArray();

        BookRequest::create([
            'book_id' => $book->id,
            'action' => 'update',
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'category' => implode(', ', $kategoriNames),
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'languange' => $request->languange,
            'book_length' => $request->book_length,
            'book_weight' => $request->book_weight,
            'book_width' => $request->book_width,
            'number_of_books' => $request->number_of_books,
            'publication_year' => $request->publication_year,
            'description' => $request->description,
            'cover' => $coverPath,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Menunggu persetujuan admin');
    }

    // =========================
    // DELETE (AJUKAN HAPUS)
    // =========================
    public function delete(Book $book)
    {
        BookRequest::create([
            'book_id' => $book->id,
            'action' => 'delete',
            'status' => 'pending'
        ]);

        return back()->with('success', 'Menunggu Persetujuan Admin');
    }
}
