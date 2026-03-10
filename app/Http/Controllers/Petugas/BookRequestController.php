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
        $kategori = KategoriBuku::all();
        return view('petugas.dataBuku.index', compact('books', 'kategori'));
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
            'KategoriID' => 'required|exists:kategoribuku,KategoriID',
            'stock' => 'required|numeric',
            'publication_year' => 'required|numeric',
            'description' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('books', 'public');
        }

        BookRequest::create([
            'action' => 'create',
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'KategoriID' => $request->KategoriID,
            'stock' => $request->stock,
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
        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('books', 'public');
        }

        BookRequest::create([
            'book_id' => $book->id,
            'action' => 'update',
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'KategoriID' => $request->KategoriID,
            'stock' => $request->stock,
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
