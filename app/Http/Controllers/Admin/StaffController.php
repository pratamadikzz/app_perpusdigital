<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\Book;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $peminjamans = Peminjaman::with(['user', 'book']);

        // Handle search functionality
        $search = $request->get('search');
        $staffsQuery = staff::query();

        if ($search) {
            $staffsQuery->where(function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('username', 'LIKE', '%' . $search . '%')
                      ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        $staffs = $staffsQuery->get();

        // Stats untuk sidebar berdasarkan role
        if (session('staff_role') === 'admin') {
            $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        } elseif (session('staff_role') === 'petugas') {
            $userAktif = 0; // Petugas tidak perlu lihat user aktif
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        } else {
            $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = 0;
        }

        return view('admin.dataPengguna.petugas.index', compact('staffs', 'userAktif', 'pinjamHariIni', 'totalPengembalian', 'dipinjam', 'search'));
    }

    public function create()
    {
        // Stats untuk sidebar berdasarkan role
        if (session('staff_role') === 'admin') {
            $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        } elseif (session('staff_role') === 'petugas') {
            $userAktif = 0; // Petugas tidak perlu lihat user aktif
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();
        } else {
            $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
            $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
            $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
            $dipinjam = 0;
        }

        return view('admin.dataPengguna.petugas.create', compact('userAktif', 'pinjamHariIni', 'totalPengembalian', 'dipinjam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:staff,username',
            'email' => 'required|email|max:255|unique:staff,email',
            'password' => 'required|min:8|confirmed',
            'alamat' => 'required|string|max:500',
            'role' => 'required|in:petugas,admin',
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'alamat.required' => 'Alamat wajib diisi',
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role yang dipilih tidak valid',
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
        if (!session()->has('staff_username')) {
            return redirect('/petugas/login');
        }

        $staff = \App\Models\Staff::where('username', session('staff_username'))->first();

        if (!$staff) {
            session()->flush();
            return redirect('/petugas/login');
        }

        // Stats untuk sidebar sama untuk admin dan petugas, tapi view dipilih berdasarkan route.
        if (session('staff_role') === 'admin') {
            $userAktif = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        } else {
            $userAktif = 0; // Petugas tidak perlu lihat user aktif
        }

        $pinjamHariIni = Peminjaman::whereDate('tanggal_peminjaman', Carbon::today())->count();
        $totalPengembalian = Peminjaman::whereIn('status', ['dikembalikan', 'selesai'])->count();
        $dipinjam = Peminjaman::whereIn('status', ['aktif', 'menunggu'])->count();

        $view = request()->routeIs('admin.*') ? 'admin.settings' : 'petugas.settings';

        return view($view, compact('staff', 'userAktif', 'pinjamHariIni', 'totalPengembalian', 'dipinjam'));
    }

    public function updateSettings(Request $request)
    {
        $staff = \App\Models\Staff::where('username', session('staff_username'))->first();

        // Validasi dasar
        $rules = [
            'username' => 'required|string|max:255|unique:staff,username,' . $staff->id,
            'email' => 'required|email|max:255|unique:staff,email,' . $staff->id,
        ];

        // Jika user ingin mengubah password, validasi password lama dan baru
        if ($request->filled('password')) {
            $rules['current_password'] = 'required';
            $rules['password'] = 'required|min:8|confirmed';
        }

        $request->validate($rules, [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'current_password.required' => 'Password lama wajib diisi untuk mengubah password',
            'password.required' => 'Password baru wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Verifikasi password lama jika user ingin mengubah password
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $staff->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak benar']);
            }
        }

        // Update data staff
        $staff->username = $request->username;
        $staff->email = $request->email;

        if ($request->filled('password')) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();

        return back()->with('success', 'Pengaturan akun berhasil diperbarui');
    }
}
