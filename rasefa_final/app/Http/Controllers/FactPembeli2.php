<?php

namespace App\Http\Controllers;
use App\Charts\KuartalPembelian2;
use Illuminate\Http\Request;

class FactPembeli2 extends Controller
{
    public function index(KuartalPembelian2 $chart)
    {
        return view('chart_fact_pembeli2', ['chart' => $chart->build()]);
    }
}
