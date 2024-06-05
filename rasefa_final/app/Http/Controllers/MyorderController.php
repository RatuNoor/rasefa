<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Pembeli;
use App\Models\Toko;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB; // Import DB
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MyorderController extends Controller
{

    public function process()
    {
        $barangProcess = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->join('toko', 'pesanan.id_toko', '=', 'toko.id_toko')
            ->where('pengiriman.status', 'Belum Dikirim')
            ->select('toko.nama_toko', 'produk.nama_produk', 'pesanan.status_pemesanan', 'produk.gambar_produk', 'pesanan.jumlah_pesanan_produk', 'produk.harga_produk', 'pesanan.total_harga', 'pengiriman.nomor_resi', 'pengiriman.status')
            ->get();
    
        // Dapatkan email pembeli yang saat ini login
        $email = Auth::guard('pembeli')->user()->email;
    
        // Dapatkan pesanan-pesanan yang terkait dengan pembeli ini
        $pesananPembeli = Pembeli::where('email', $email)->first();
    
        return view('akun/akun-myorders', compact('barangProcess'));
    }
    

    public function pesananBatal(Request $request)
    {
        $request->validate([
            'nomor_resi' => 'required|integer',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {

            // Hapus data dari tabel 'pengiriman' berdasarkan nomor resi
            DB::table('pengiriman')->where('nomor_resi', $request->input('nomor_resi'))->delete();

            // Hapus data dari tabel 'pesanan' berdasarkan nomor resi
            DB::table('pesanan')->where('nomor_resi', $request->input('nomor_resi'))->delete();            

            // Commit transaksi database jika berhasil
            DB::commit();
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            DB::rollback();

            // Handle kesalahan sesuai kebutuhan Anda
            // Misalnya, tampilkan pesan kesalahan kepada pengguna
        }

        // Redirect kembali ke halaman yang sesuai setelah berhasil
        return redirect()->route('akun-myorders');
    }

    public function shipped()
    {

        $barangShipped = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->join('toko', 'pesanan.id_toko', '=', 'toko.id_toko')
            ->where('pengiriman.status', 'Sudah Dikirim')

            ->select('toko.nama_toko', 'produk.nama_produk', 'pesanan.status_pemesanan', 'produk.gambar_produk', 'pesanan.jumlah_pesanan_produk', 'produk.harga_produk', 'pesanan.total_harga', 'pengiriman.nomor_resi', 'pengiriman.status')
            ->get();

        // Dapatkan email pembeli yang saat ini login
        $email = Auth::guard('pembeli')->user()->email;
    
        // Dapatkan pesanan-pesanan yang terkait dengan pembeli ini
        $pesananPembeli = Pembeli::where('email', $email)->first();
    
        return view('akun/shipped', compact('barangShipped'));
    }

    public function received()
    {
        $barangReceived = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->join('toko', 'pesanan.id_toko', '=', 'toko.id_toko')
            ->where('pengiriman.status', 'Sudah Sampai')
            ->select('toko.nama_toko', 'produk.nama_produk', 'pesanan.status_pemesanan', 'produk.gambar_produk', 'pesanan.jumlah_pesanan_produk', 'produk.harga_produk', 'pesanan.total_harga', 'pengiriman.nomor_resi', 'pengiriman.status')
            ->get();
        // Dapatkan email pembeli yang saat ini login
        $email = Auth::guard('pembeli')->user()->email;

        // Dapatkan pesanan-pesanan yang terkait dengan pembeli ini
        $pesananPembeli = Pembeli::where('email', $email)->first();

        return view('akun/received', compact('barangReceived'));
    }

    public function konfirmasiBarang(Request $request)
    {
        $request->validate([
            'nomor_resi' => 'required|integer',
        ]);

        // Lakukan perubahan status barang ke "Sudah Dikonfirmasi" di database
        DB::table('pengiriman')
            ->where('nomor_resi', $request->nomor_resi)
            ->update(['status' => 'Sudah Dikonfirmasi']);
        // Redirect kembali ke halaman "Sudah Dikonfirmasi" setelah berhasil
        return Redirect::route('received');
    }

    public function completed()
    {
        $barangCompleted = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->join('toko', 'pesanan.id_toko', '=', 'toko.id_toko')
            ->where('pengiriman.status', 'Sudah Dikonfirmasi')
            ->select('toko.nama_toko', 'produk.nama_produk', 'pesanan.status_pemesanan', 'produk.gambar_produk', 'pesanan.jumlah_pesanan_produk', 'produk.harga_produk', 'pesanan.total_harga', 'pengiriman.nomor_resi', 'pengiriman.status')
            ->get();

        // Dapatkan email pembeli yang saat ini login
        $email = Auth::guard('pembeli')->user()->email;

        // Dapatkan pesanan-pesanan yang terkait dengan pembeli ini
        $pesananPembeli = Pembeli::where('email', $email)->first();

        return view('akun/completed', compact('barangCompleted'));
    }

}

