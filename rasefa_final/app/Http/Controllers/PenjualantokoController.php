<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TokoChart;
use App\Models\fakta_penjualan;

class PenjualantokoController extends Controller
{
    public function chart(TokoChart $chart)
    {
        $data = fakta_penjualan::orderBy('total_harga', 'desc')->get();
        $labels = $data->pluck('nama_toko');
        $values = $data->pluck('total_harga');

        return view('penjualantoko-chart', ['chart' => $chart->build(), 'labels' => $labels, 'values' => $values]);
    }
}
