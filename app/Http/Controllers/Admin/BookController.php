<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
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
            'category' => 'required|array|min:1',
            'category.*' => 'required|exists:kategoribuku,KategoriID',
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

        $kategoriNames = KategoriBuku::whereIn('KategoriID', $request->category)
            ->pluck('NamaKategori')
            ->toArray();

        $buku = Book::create([
            'cover' => $coverPath,
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
            'description' => $request->description
        ]);

        $buku->categories()->sync($request->category);




        // DB::table('kategoribuku_relasi')->insert([
        //     'BukuID' => $buku->id,
        //     'KategoriID' => $request->KategoriID
        // ]);

        return redirect()->route('admin.dataBuku.index')->with('success', 'Buku ditambahkan');
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

        $kategoriNames = KategoriBuku::whereIn('KategoriID', $request->category)
            ->pluck('NamaKategori')
            ->toArray();

        $data = [
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
        ];

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        $book->update($data);
        $book->categories()->sync($request->category);

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

        // Coba ambil dari session (untuk show struk setelah submit)
        if ($peminjamanId = session('peminjaman_id')) {
            $peminjaman = Peminjaman::with(['user', 'buku'])->find($peminjamanId);
        }

        // Cek apakah user sudah memiliki peminjaman aktif (kecuali peminjaman yang baru dibuat dan sedang ditampilkan)
        if (Auth::check()) {
            $query = Peminjaman::where('user_id', Auth::id())
                ->whereIn('status', ['pending', 'aktif', 'menunggu']);

            if ($peminjaman) {
                $query->where('id', '!=', $peminjaman->id);
            }

            $peminjamanAktif = $query->exists();

            if ($peminjamanAktif) {
                return redirect()->back()->with('error', 'Anda masih memiliki peminjaman aktif. Harap kembalikan buku terlebih dahulu sebelum meminjam buku baru.');
            }
        }

        return view('peminjam.peminjaman.form', compact('book', 'peminjaman'));
    }
    // public function show(Book $book)
    // {
    //     return view('admin.dataBuku.detail', compact('book'));
    // }
}
