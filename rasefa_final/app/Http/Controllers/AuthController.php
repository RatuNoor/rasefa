<?php

namespace App\Http\Controllers;

use App\Models\LoginPembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Coba untuk melakukan otentikasi
        if (Auth::guard('pembeli')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        } elseif (Auth::guard('toko')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/produk');
        } elseif (Auth::guard('logistik')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/perlu-dikirim');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/pilihfact');    
        } else {
            return back()
                ->withInput($request->only('email'))
                ->with('LoginError', 'Login Gagal! Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect('/login'); // Redirect pengguna ke halaman utama setelah logout
    }
}
