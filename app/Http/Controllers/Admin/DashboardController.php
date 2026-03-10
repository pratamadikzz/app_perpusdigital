<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\Book;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        $totalKategori = KategoriBuku::count();
        $totalUser = User::count();
        $totalStaff = staff::count();
        $totalAkun = $totalUser + $totalStaff;
        return view('admin.dashboard', compact('totalUser', 'totalStaff', 'totalAkun', 'totalBuku', 'totalKategori'));
    }
}
