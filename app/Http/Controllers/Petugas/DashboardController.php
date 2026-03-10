<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        return view('petugas.dashboard', compact('totalBuku'));
    }
}
