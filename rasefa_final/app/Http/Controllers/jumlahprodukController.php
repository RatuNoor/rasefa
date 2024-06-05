<?php

namespace App\Http\Controllers;
use App\Charts\jumlahprodukChart;
use App\Models\fakta_penjualan;
use Illuminate\Http\Request;

class jumlahprodukController extends Controller
{

    public function chart(jumlahprodukChart $chart)
    {
        $data = fakta_penjualan::orderBy('jumlah_pesanan_produk', 'desc')->get();
        $labels = $data->pluck('nama_produk');
        $values = $data->pluck('jumlah_pesanan_produk');

        return view('jumlah-produk', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}
