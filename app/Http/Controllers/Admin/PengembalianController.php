<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Peminjaman::with('book','user')
                        ->where('status','menunggu')
                        ->latest()
                        ->get();

        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    public function approve($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->status = 'dikembalikan';
        $pinjam->save();

        return back()->with('success','Pengembalian disetujui');
    }

    public function tolak($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->status = 'ditolak';
        $pinjam->save();

        return back()->with('success','Pengembalian ditolak');
    }
}
