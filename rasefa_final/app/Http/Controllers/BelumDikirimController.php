<?php

namespace App\Http\Controllers;

use App\Charts\BelumDikirim;
use App\Models\FaktaPengiriman;
use Illuminate\Http\Request;

class BelumDikirimController extends Controller
{
    public function index(BelumDikirim $chart)
    {
        // Get data from the FaktaPengiriman model
        $data = FaktaPengiriman::where('status', 'Belum Dikirim')
            ->groupBy('nama_logistik')
            ->selectRaw('nama_logistik, COUNT(*) as jumlah_belum_dikirim')
            ->orderBy('jumlah_belum_dikirim', 'asc')
            ->get();

        $labels = $data->pluck('nama_logistik');
        $values = $data->pluck('jumlah_belum_dikirim');

        // Pass the data to the view
        return view('belumdikirim', ['chart' => $chart->build($labels, $values)]);
    }
}
