<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function registerProcess(Request $request)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'alamat' => 'required',
        'password' => 'required|confirmed|min:5',
    ]);

    // 🔴 Cegah email dipakai admin/petugas
    if (Staff::where('email', $request->email)->exists()) {
        return back()->withErrors([
            'email' => 'Email ini sudah digunakan oleh admin/petugas!'
        ])->withInput();
    }

    // 🔴 (Opsional) Cegah username juga
    if (Staff::where('username', $request->username)->exists()) {
        return back()->withErrors([
            'username' => 'Username ini sudah digunakan oleh admin/petugas!'
        ])->withInput();
    }

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/auth/login')->with('success', 'Akun berhasil dibuat');
}

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if user exists
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email yang Anda masukkan tidak terdaftar dalam sistem.']);
        }

        // Check if password is correct
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['password' => 'Password yang Anda masukkan salah.']);
        }

        // If both email and password are correct, attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/peminjam');
        }

        // Fallback error
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showProfile()
    {
        return view('peminjam.settings', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'required|string|max:255',
            'password' => 'nullable|confirmed|min:5',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
