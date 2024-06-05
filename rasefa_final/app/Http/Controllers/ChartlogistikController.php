<?php

// app/Http/Controllers/ChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PengirimanChart;

class ChartlogistikController extends Controller
{
    public function index(PengirimanChart $chart)
    {
        return view('chartlogistik', ['chart' => $chart->build()]);
    }
}

