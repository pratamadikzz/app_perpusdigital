<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })->get();
        return view('admin.dataPengguna.peminjam.index', compact('users'));
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.dataPengguna.peminjam.edit', compact('user'));
    // }

    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
}
