<?php

namespace App\Http\Controllers;
use App\Charts\jumlahtokoChart;
use App\Models\fakta_penjualan;
use Illuminate\Http\Request;

class jumlahtokoController extends Controller
{
    public function chart(jumlahtokoChart $chart)
    {
        $data = fakta_penjualan::orderBy('jumlah_pesanan_produk', 'desc')->get();
        $labels = $data->pluck('nama_toko');
        $values = $data->pluck('jumlah_pesanan_produk');

        return view('jumlah-toko', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}
