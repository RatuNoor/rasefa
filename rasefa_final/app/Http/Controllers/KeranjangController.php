<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\DetailPesanan;
use App\Models\Product; // Import model Produk
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function tambahKeKeranjang(Request $request)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'kuantitas' => 'required|integer|min:1',
        ]);

        // Pastikan pembeli telah login sebelum menambahkan ke keranjang
        if (Auth::guard('pembeli')->check()) {
            $id_pembeli = Auth::guard('pembeli')->user()->id_pembeli;

            // Dapatkan id_toko dari produk yang ditambahkan ke keranjang
            $produk = Product::findOrFail($request->id_produk);
            $id_toko = $produk->id_toko;

            // Simpan data ke tabel 'keranjang' menggunakan model Keranjang
            $newKeranjang = Keranjang::create([
                'id_pembeli' => $id_pembeli,
                'id_produk' => $request->id_produk,
                'id_toko' => $id_toko, // Menggunakan id_toko dari produk
                'kuantitas' => $request->kuantitas,
            ]);

            // Redirect pengguna ke halaman keranjang setelah berhasil menambahkan produk.
            return redirect('/keranjang');
        } else {
            // Redirect ke halaman login jika pembeli belum login
            return redirect('/login');
        }
    }

    public function index()
    {
        // Dapatkan ID pembeli yang terautentikasi
        $id_pembeli = Auth::guard('pembeli')->user()->id_pembeli;

        $keranjangItems = Keranjang::where('id_pembeli', $id_pembeli)
            ->orderBy('id_keranjang')
            ->orderBy('id_toko')
            ->get();

        // Group data berdasarkan 'id_toko'
        $groupedKeranjang = $keranjangItems->groupBy('id_toko');

        return view('keranjang', ['groupedKeranjang' => $groupedKeranjang, 'tokoTerakhir' => null, 'no' => 1]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'no_telfon' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'metode_pembayaran' => 'required',
            'opsi_pengiriman' => 'required',
        ]);
    
        if (Auth::guard('pembeli')->check()) {
            $id_pembeli = Auth::guard('pembeli')->user()->id_pembeli;
            $itemsInKeranjang = Keranjang::where('id_pembeli', $id_pembeli)->with('produk')->get();
    
            $totalHarga = 0;
            $jumlahPesanan = 0;
    
            foreach ($itemsInKeranjang as $item) {
                $totalHarga += $item->kuantitas * $item->produk->harga_produk;
                $jumlahPesanan += $item->kuantitas;
            }
    
            $keranjangItems = Keranjang::where('id_pembeli', $id_pembeli)->get();
    
            if ($keranjangItems->count() > 0) {
                $id_toko = $keranjangItems->first()->id_toko;
                $id_produk = $keranjangItems->first()->id_produk;
            } else {
                // Tindakan yang sesuai jika tidak ada item di keranjang
            }
    
            // Buat objek pesanan
            $pesanan = new Pesanan();
            $pesanan->id_toko = $id_toko;
            $pesanan->tanggal_order = Carbon::now()->format('Y-m-d');
            $pesanan->total_harga = $totalHarga;
            $pesanan->status_pemesanan = "Belum Dikirim";
            $pesanan->jumlah_pesanan_produk = $jumlahPesanan;
            $pesanan->id_pembeli = $id_pembeli;
            $pesanan->nomor_resi = 0;
            $pesanan->id_produk = $id_produk; // Tambahkan id_produk ke dalam pesanan
    
            $userId = $id_pembeli;
            $mikrodetik = explode(" ", microtime())[0];
            $mikrodetik = substr($mikrodetik, 2, 8);
            $nomorResi = $userId . time() . $mikrodetik;
            $pesanan->nomor_resi = 0;
    
            // Simpan objek pesanan
            $pesanan->save();
    
            // .
    
            // Hapus item keranjang yang ada dalam pesanan saat ini
            Keranjang::where('id_pembeli', $id_pembeli)->delete();
    
            return redirect()->route('akun-myorders');
        } else {
            // Redirect ke halaman login jika pembeli belum login
            return redirect('/login');
        }
    }
    
}    