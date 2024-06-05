<?php

namespace App\Http\Controllers;

use App\Charts\SudahDikonfirmasi;
use App\Models\FaktaPengiriman;
use Illuminate\Http\Request;

class SudahDikonfirmasiController extends Controller
{
    public function index(SudahDikonfirmasi $chart)
    {
        // Get data from the FaktaPengiriman model
        $data = FaktaPengiriman::where('status', 'Sudah Dikonfirmasi')
            ->groupBy('nama_logistik')
            ->selectRaw('nama_logistik, COUNT(*) as jumlah_sudah_dikonfirmasi')
            ->orderBy('jumlah_sudah_dikonfirmasi', 'asc')
            ->get();

        $labels = $data->pluck('nama_logistik');
        $values = $data->pluck('jumlah_sudah_dikonfirmasi');

        // Pass the data to the view
        return view('sudahdikonfirmasi', ['chart' => $chart->build($labels, $values)]);
    }
}
