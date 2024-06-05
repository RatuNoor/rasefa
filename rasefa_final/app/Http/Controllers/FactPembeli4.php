<?php

namespace App\Http\Controllers;

use App\Charts\KuartalPembelian1;
use Illuminate\Http\Request;

class FactPembeli4 extends Controller
{
    public function index(KuartalPembelian1 $chart)
    {
        return view('chart_fact_pembeli4', ['chart' => $chart->build()]);
    }
}
