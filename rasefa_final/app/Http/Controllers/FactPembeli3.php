<?php

namespace App\Http\Controllers;
use App\Charts\BulanPembelian;
use Illuminate\Http\Request;

class FactPembeli3 extends Controller
{
    public function index(BulanPembelian $chart)
    {
        return view('chart_fact_pembeli3', ['chart' => $chart->build()]);
    }
}
