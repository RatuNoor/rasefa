<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistik;
use Illuminate\Support\Facades\Hash;

class RegistrasiLogistikController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registrasilogistik'); // Assuming the Blade view is in the root of the resources/views directory
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'nama_logistik' => 'required',
            'username_logistik' => 'required|unique:logistik',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:logistik',
        ]);

        // Create a new Toko instance and save it to the database
        $logistik = new Logistik();
        $logistik->nama_logistik= $request->input('nama_logistik');
        $logistik->username_logistik = $request->input('username_logistik');
        $logistik->password = Hash::make($request->input('password')); // Hash the password for security
        $logistik->email = $request->input('email');
        $logistik->save();

        // Redirect to the login page or another page after successful registration
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
