<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LogisticController extends Controller
{
    public function perluDikirim()
    {
        $loggedInUser = Auth::guard('logistik')->user();
        $barangPerluDikirim = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->where('pengiriman.status', 'Belum Dikirim')
            ->where('logistik.email', $loggedInUser->email) 
            ->select('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik', 
                     DB::raw('GROUP_CONCAT(produk.nama_produk) as daftar_produk'), 
                     DB::raw('SUM(pesanan.jumlah_pesanan_produk) as total_kuantitas'))
            ->groupBy('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik')
            ->get();
        
        return view('perlu-dikirim', compact('barangPerluDikirim'));          

    }
    public function editNomorResi(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nomor_resi' => 'required',
            'new_nomor_resi' => 'required',
        ]);

        // Perbarui nomor resi dalam tabel pengiriman
        DB::table('pengiriman')
            ->where('nomor_resi', $request->input('nomor_resi'))
            ->update(['nomor_resi' => $request->input('new_nomor_resi')]);

        return redirect()->back()->with('success', 'Nomor Resi berhasil diperbarui');
    }


    public function sudahDikirim()
    {
        $loggedInUser = Auth::guard('logistik')->user();
        $barangSudahDikirim = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->where('pengiriman.status', 'Sudah Dikirim')
            ->where('logistik.email', $loggedInUser->email) 
            ->select('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik', 
                     DB::raw('GROUP_CONCAT(produk.nama_produk) as daftar_produk'), 
                     DB::raw('SUM(pesanan.jumlah_pesanan_produk) as total_kuantitas'))
            ->groupBy('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik')
            ->get();
        
        return view('sudah-dikirim', compact('barangSudahDikirim'));     
    }

    public function kirimBarang(Request $request)
    {
        $request->validate([
            'nomor_resi' => 'required|integer',
        ]);

        DB::table('pengiriman')
            ->where('nomor_resi', $request->nomor_resi)
            ->update(['status' => 'Sudah Dikirim']);
            return Redirect::route('perlu-dikirim');
    }

    public function barangSampai(Request $request)
    {
        $request->validate([
            'nomor_resi' => 'required|integer',
        ]);

        // Lakukan perubahan status barang ke "Sudah Sampai" di database
        DB::table('pengiriman')
            ->where('nomor_resi', $request->nomor_resi)
            ->update(['status' => 'Sudah Sampai']);
        // Redirect kembali ke halaman "Sudah Dikirim" setelah berhasil
        return Redirect::route('sudah-dikirim');
    }
    public function sudahSampai()
    {
        $loggedInUser = Auth::guard('logistik')->user();
        $barangSudahSampai = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->where('pengiriman.status', 'Sudah Sampai')
            ->where('logistik.email', $loggedInUser->email) 
            ->select('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik', 
                     DB::raw('GROUP_CONCAT(produk.nama_produk) as daftar_produk'), 
                     DB::raw('SUM(pesanan.jumlah_pesanan_produk) as total_kuantitas'))
            ->groupBy('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik')
            ->get();
        
        return view('sudah-sampai', compact('barangSudahSampai'));  

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
        return Redirect::route('sudah-sampai');
    }

    public function sudahSelesai()
    {
        $loggedInUser = Auth::guard('logistik')->user();
        $barangSudahSelesai = DB::table('pengiriman')
            ->join('logistik', 'pengiriman.id_logistik', '=', 'logistik.id_logistik')
            ->join('pesanan', 'pengiriman.id_order', '=', 'pesanan.id_order')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id_produk')
            ->where('pengiriman.status', 'Sudah Dikonfirmasi')
            ->where('logistik.email', $loggedInUser->email) 
            ->select('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik', 
                     DB::raw('GROUP_CONCAT(produk.nama_produk) as daftar_produk'), 
                     DB::raw('SUM(pesanan.jumlah_pesanan_produk) as total_kuantitas'))
            ->groupBy('pengiriman.nomor_resi', 'pengiriman.status', 'pengiriman.id_logistik')
            ->get();
        
        return view('sudah-selesai', compact('barangSudahSelesai'));  

        
    }

}