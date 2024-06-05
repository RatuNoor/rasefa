<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\DB; // Import DB
use Illuminate\Support\Facades\Redirect;

class KatalogController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->join('toko', 'produk.id_toko', '=', 'toko.id_toko')
            ->select('produk.*', 'toko.nama_toko')
            ->get();

        return view('home', compact('produk'));
    }

//     public function search(Request $request)
// {
//     $query = $request->input('query');
    
//     $produk = DB::table('produk')
//         ->join('toko', 'produk.id_toko', '=', 'toko.id_toko')
//         ->select('produk.*', 'toko.nama_toko')
//         ->where('produk.nama_produk', 'LIKE', "%$query%")
//         ->get();

//     return view('home', compact('produk'));
// }

}
