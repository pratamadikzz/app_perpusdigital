<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StaffAuthController extends Controller
{
    public function showLogin()
    {
        return view('petugas.login');
    }

    public function login(Request $request)
    {
        $staff = staff::where('email', $request->email)->first();

        if (!$staff || !Hash::check($request->password, $staff->password)) {
            return back()->with('error', 'Login gagal');
        }

        session([
            'staff_id' => $staff->id,
            'staff_role' => $staff->role,
            'staff_name' => $staff->name,
            'staff_username' => $staff->username
        ]);
    
        if ($staff->role == 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/petugas/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/petugas/login');
    }
}
