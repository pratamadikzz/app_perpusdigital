<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBuku::all();
        return view('admin.dataKategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataKategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KategoriBuku::create([
            'NamaKategori' => $request->NamaKategori
        ]);

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = KategoriBuku::findOrFail($id);

        $buku = DB::table('books')
            ->join(
                'kategoribuku_relasi',
                'books.id',
                '=',
                'kategoribuku_relasi.BukuID'
            )
            ->where('kategoribuku_relasi.KategoriID', $id)
            ->select('books.*')
            ->get();

        return view('admin.dataKategori.detail', compact('kategori', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        return view('admin.dataKategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->update([
            'NamaKategori' => $request->NamaKategori
        ]);

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        KategoriBuku::destroy($id);
        return redirect()->route('kategori.index');
    }
}
