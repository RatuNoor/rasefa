<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        
        // Periksa apakah pengguna yang login adalah pengguna toko
        if (Auth::guard('toko')->check()) {
            // Ambil email dari pengguna toko yang login
            $emailToko = Auth::guard('toko')->user()->email;
        
            // Dapatkan data toko berdasarkan email
            $toko = Toko::where('email', $emailToko)->first();
        
            if ($toko) {
                // Dapatkan produk yang terkait dengan toko
                $produk = $toko->produk;
        
                // Sekarang Anda memiliki daftar produk yang sesuai dengan toko yang login
            } else {
                // Handle jika tidak ada toko dengan email yang sesuai
                $produk = collect(); // Ini akan menghasilkan koleksi kosong
            }
        } else {
            // Handle jika pengguna bukan pengguna toko
            $produk = collect(); // Ini akan menghasilkan koleksi kosong
        }
        
    
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $tokos = Toko::all();
        return view('produk.create', compact('tokos'));
    }

    public function store(Request $request)
    {
        $email = Auth::guard('toko')->user()->email;
        // Dapatkan pesanan-pesanan yang terkait dengan pembeli ini
        $pesananPembeli = Toko::where('email', $email)->first();

        $request->validate([
            'id_toko' => 'required',
            'nama_produk' => 'required',
            'kategori_produk' => 'required',
            'harga_produk' => 'required',
            'stok' => 'required',
            'gambar_produk' => 'required|mimes:png,jpg,jpeg,mp4'
        ]);

        $filename = time() . '.' . $request->gambar_produk->getClientOriginalExtension();
        $request->gambar_produk->move(public_path('gambar_produk'), $filename);

        $produk = new Product();
        $produk->id_toko = $request->id_toko;
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok = $request->stok;
        $produk->gambar_produk = $filename;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id_produk)
    {
        $produk = Product::findOrFail($id_produk);
        $tokos = Toko::all();

        return view('produk.edit', compact('produk', 'tokos'));
    }

    public function update(Request $request, $id_produk)
    {
        $produk = Product::findOrFail($id_produk);

        $request->validate([
            'id_toko' => 'required',
            'nama_produk' => 'required',
            'kategori_produk' => 'required',
            'harga_produk' => 'required',
            'stok' => 'required',
            'gambar_produk' => 'sometimes|mimes:png,jpg,jpeg,mp4'
        ]);

        if ($request->hasFile('gambar_produk')) {
            $previousMedia = public_path('gambar_produk/' . $produk->gambar_produk);
            if (file_exists($previousMedia)) {
                unlink($previousMedia);
            }

            $filename = time() . '.' . $request->gambar_produk->getClientOriginalExtension();
            $request->gambar_produk->move(public_path('gambar_produk'), $filename);
            $produk->gambar_produk = $filename;
        }

        $produk->id_toko = $request->id_toko;
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok = $request->stok;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id_produk)
    {
        $produk = Product::findOrFail($id_produk);

        $mediaPath = public_path('gambar_produk/' . $produk->gambar_produk);
        if (file_exists($mediaPath)) {
            unlink($mediaPath);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
