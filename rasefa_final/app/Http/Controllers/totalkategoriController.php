<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\totalkategoriChart;
use App\Models\fakta_penjualan;

class totalkategoriController extends Controller
{
    public function chart(totalkategoriChart $chart)
    {
        $data = fakta_penjualan::orderBy('total_harga', 'desc')->get();
        $labels = $data->pluck('kategori_produk');
        $values = $data->pluck('total_harga');

        return view('total-kategori', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}


