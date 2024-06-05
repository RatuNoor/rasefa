<?php

namespace App\Http\Controllers;

use App\Charts\SudahSampai;
use App\Models\FaktaPengiriman;
use Illuminate\Http\Request;

class SudahSampaiController extends Controller
{
    public function index(SudahSampai $chart)
    {
        // Get data from the FaktaPengiriman model
        $data = FaktaPengiriman::where('status', 'Sudah Sampai')
            ->groupBy('nama_logistik')
            ->selectRaw('nama_logistik, COUNT(*) as jumlah_sudah_sampai')
            ->orderBy('jumlah_sudah_sampai', 'asc')
            ->get();

        $labels = $data->pluck('nama_logistik');
        $values = $data->pluck('jumlah_sudah_sampai');

        // Pass the data to the view
        return view('sudahsampai', ['chart' => $chart->build($labels, $values)]);
    }
}
