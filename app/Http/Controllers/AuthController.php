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

            User::create ([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/login')->with('success', 'akun berhasil dibuat');
        }

        public function loginProcess(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/peminjam');
            }

            return back()->with('error','Login gagal');
        }
    }
