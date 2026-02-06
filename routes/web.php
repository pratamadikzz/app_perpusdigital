<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landing');
})->name('landing');


//petugas
Route::get('petugas/dashboard', function(){
    return view('petugas/dashboard');
});

Route::get('petugas/login', function() {
    return view('petugas/login');
})->name('petugas/login');

//data petugas
Route::get('admin/dataPengguna/petugas/index', function(){
    return view('admin/dataPengguna/petugas/index');
})->name('admin/dataPengguna/petugas/index');


//admin
Route::get('admin/dashboard', function() {
    return view('admin/dashboard');
})->name('admin/dashboard');


//data peminjam
Route::get('admin/dataPengguna/peminjam/index', function(){
    return view('admin/dataPengguna/peminjam/index');
})->name('admin/dataPengguna/peminjam/index');

//peminjam
Route::get('peminjam/index', function(){
    return view('peminjam/index');
})->name('peminjam/index');

Route::get('peminjam/buku/detail', function(){
    return view('peminjam/buku/detail');
})->name('peminjam/buku/detail');


Route::get('peminjam/peminjaman/form', function(){
    return view('peminjam.peminjaman.form');
})->name('peminjaman/form');



//Login
Route::get('login', function() {
    return view('/auth/login');
})->name('auth/login');

Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

//register
Route::get('register', function(){
    return view('auth/register');
})->name('auth/register');

Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
