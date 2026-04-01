<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'email' => 'required|unique:users',
            'alamat' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/auth/login')->with('success', 'akun berhasil dibuat');
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
}
