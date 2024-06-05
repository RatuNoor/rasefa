<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registrasi'); // Assuming the Blade view is in the root of the resources/views directory
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'email' => 'required|email|unique:pembeli',
            'password' => 'required|min:6',
            'username' => 'required|unique:pembeli',
        ]);

        // Create a new Pembeli instance and save it to the database
        $pembeli = new Pembeli();
        $pembeli->nama = $request->input('nama');
        $pembeli->alamat = $request->input('alamat');
        $pembeli->no_telfon = $request->input('no_telfon');
        $pembeli->email = $request->input('email');
        $pembeli->password = Hash::make($request->input('password')); // Hash the password for security
        $pembeli->username = $request->input('username');
        
        // Simpan data ke database dengan menggunakan method save(), bukan save saja.
        $pembeli->save();
        
        // Redirect to the login page or another page after successful registration
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}
