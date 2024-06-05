<?php

namespace App\Http\Controllers;

use App\Charts\SudahDikirim;
use App\Models\FaktaPengiriman;
use Illuminate\Http\Request;

class SudahDikirimController extends Controller
{
    public function index(SudahDikirim $chart)
    {
        // Get data from the FaktaPengiriman model
        $data = FaktaPengiriman::where('status', 'Sudah Dikirim')
            ->groupBy('nama_logistik')
            ->selectRaw('nama_logistik, COUNT(*) as jumlah_sudah_dikirim')
            ->orderBy('jumlah_sudah_dikirim', 'asc')
            ->get();

        $labels = $data->pluck('nama_logistik');
        $values = $data->pluck('jumlah_sudah_dikirim');

        // Pass the data to the view
        return view('sudahdikirim', ['chart' => $chart->build($labels, $values)]);
    }
}
