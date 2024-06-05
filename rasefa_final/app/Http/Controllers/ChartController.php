<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\rasefaChart;
use App\Models\fakta_penjualan;

class ChartController extends Controller
{
    public function chart(rasefaChart $chart)
    {
        $data = fakta_penjualan::orderBy('jumlah_pesanan_produk', 'desc')->get();
        $labels = $data->pluck('nama_toko');
        $values = $data->pluck('jumlah_pesanan_produk');

        return view('rasefa-chart', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}


