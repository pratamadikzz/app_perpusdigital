<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        $kategori = KategoriBuku::all();
        return view('admin.dataBuku.index', compact('books', 'kategori'));
    }

    public function create()
    {
        return view('admin.dataBuku.modal_create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'stock' => 'required|numeric',
            'isbn' => 'required|string|max:250',
            'languange' => 'required|string|max:250',
            'book_length' => 'required|numeric',
            'book_weight' => 'required|numeric',
            'book_width' => 'required|numeric',
            'number_of_books' => 'required|numeric',
            'publication_year' => 'required|numeric',
            'description' => 'required',
        ]);




        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')
                ->store('covers', 'public');
        }

        // $kategori = KategoriBuku::find($request->category);

        $buku = Book::create([
            'cover' => $coverPath,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'languange' => $request->languange,
            'book_length' => $request->book_length,
            'book_weight' => $request->book_weight,
            'book_width' => $request->book_width,
            'number_of_books' => $request->number_of_books,
            'publication_year' => $request->publication_year,
            'description' => $request->description
        ]);




        // DB::table('kategoribuku_relasi')->insert([
        //     'BukuID' => $buku->id,
        //     'KategoriID' => $request->KategoriID
        // ]);

        return back()->with('success', 'Buku ditambahkan');
    }


    public function update(Request $request, Book $book)
    {
        $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'stock' => 'required|numeric',
            'isbn' => 'required|string|max:256',
            'languange' => 'required|string|max:5',
            'book_length' => 'required|numeric',
            'book_weight' => 'required|numeric',
            'book_width' => 'required|numeric',
            'number_of_books' => 'required|numeric',
            'publication_year' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'languange' => $request->languange,
            'book_length' => $request->book_length,
            'book_weight' => $request->book_weight,
            'book_width' => $request->book_width,
            'number_of_books' => $request->number_of_books,
            'publication_year' => $request->publication_year,
            'description' => $request->description,
        ];

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        $book->update($data);

        return back()->with('success', 'Buku diperbarui');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('success', 'Buku dihapus');
    }


    public function Formpinjam(Book $book)
    {
        $peminjaman = null;

        if (session('peminjaman_id')) {
            $peminjaman = Peminjaman::with(['user', 'buku'])
                ->find(session('peminjaman_id'));
        }

        return view('peminjam.peminjaman.form', compact('book', 'peminjaman'));
    }
    // public function show(Book $book)
    // {
    //     return view('admin.dataBuku.detail', compact('book'));
    // }
}
