<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'book']);
        $staffs = staff::all();
        return view('admin.dataPengguna.petugas.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.dataPengguna.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:staff,username',
            'email' => 'required|email|unique:staff,email',
            'password' => 'required|min:5',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        staff::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return redirect('admin/dataPengguna/petugas/index')
            ->with('success', 'Petugas berhasil dibuat');
    }

    public function settings()
    {
        $staff = \App\Models\Staff::where('name', session('staff_name'))->first();

        return view('admin.settings', compact('staff'));
    }

    public function updateSettings(Request $request)
    {
        $staff = \App\Models\Staff::where('name', session('staff_name'))->first();

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:5'
        ]);

        $staff->username = $request->username;
        $staff->email = $request->email;

        if ($request->password) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();

        return back()->with('success', 'Akun berhasil diperbarui');
    }
}
