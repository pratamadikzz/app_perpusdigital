<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        $token = \Illuminate\Support\Str::random(60);

        // Simpan token di database password_resets
        \DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => \Hash::make($token), 'created_at' => now()]
        );

        // Untuk demo, tampilkan link reset
        $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);

        return back()->with('status', 'Link reset password: ' . route('password.reset') . ' (Demo - kunjungi halaman reset password)');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:5',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        $user->password = \Hash::make($request->password);
        $user->save();

        return redirect('/auth/login')->with('status', 'Password berhasil direset.');
    }
}
