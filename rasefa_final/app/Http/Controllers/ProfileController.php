<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $pembeli = Pembeli::first(); // Mengambil data pembeli pertama dari tabel

        return view('profile', compact('pembeli'));
    }
}

