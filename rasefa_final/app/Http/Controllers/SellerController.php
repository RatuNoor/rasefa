<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product; // Sebelumnya Anda menggunakannya sebagai Produk, perlu diubah menjadi Product
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $jumlahToko = Toko::count();
        $jumlahProduk = Product::count(); // Ubah Produk menjadi Product

        return view('seller', [
            'jumlahToko' => $jumlahToko,
            'jumlahProduk' => $jumlahProduk
        ]);
    }
}
