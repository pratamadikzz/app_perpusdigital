<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    Public function index()
    {
        $users = User::all();
        return view('admin.dataPengguna.peminjam.index', compact('users'));
    }
}
