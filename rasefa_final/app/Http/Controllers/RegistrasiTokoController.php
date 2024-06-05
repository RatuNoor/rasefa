<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Hash;

class RegistrasiTokoController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registrasitoko'); // Assuming the Blade view is in the root of the resources/views directory
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'username_toko' => 'required|unique:toko',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:toko',
        ]);

        // Create a new Toko instance and save it to the database
        $toko = new Toko();
        $toko->nama_toko = $request->input('nama_toko');
        $toko->alamat_toko = $request->input('alamat_toko');
        $toko->username_toko = $request->input('username_toko');
        $toko->password = Hash::make($request->input('password')); // Hash the password for security
        $toko->email = $request->input('email');
        $toko->save();

        // Redirect to the login page or another page after successful registration
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
