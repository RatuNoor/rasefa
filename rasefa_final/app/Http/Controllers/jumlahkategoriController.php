<?php

namespace App\Http\Controllers;
use App\Charts\jumlahkategoriChart;
use App\Models\fakta_penjualan;
use Illuminate\Http\Request;

class jumlahkategoriController extends Controller
{

    public function chart(jumlahkategoriChart $chart)
    {
        $data = fakta_penjualan::orderBy('jumlah_pesanan_produk', 'desc')->get();
        $labels = $data->pluck('kategori_produk');
        $values = $data->pluck('jumlah_pesanan_produk');

        return view('jumlah-kategori', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}
