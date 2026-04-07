<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('petugas.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staff,email',
        ]);

        $staff = Staff::where('email', $request->email)->first();

        // Kirim email (untuk demo, kita redirect dengan pesan)
        // Mail::to($staff->email)->send(new StaffResetPasswordMail($token));

        return back()->with('status', 'Link reset password telah dikirim ke email Anda. (Demo: kunjungi ' . route('staff.password.reset') . ')');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('petugas.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staff,email',
            'password' => 'required|confirmed|min:5',
        ]);

        $staff = Staff::where('email', $request->email)->first();
        $staff->password = Hash::make($request->password);
        $staff->save();

        return redirect('/petugas/login')->with('status', 'Password berhasil direset.');
    }
}
