<?php

// app/Http/Controllers/StatusController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\StatusChart;

class StatusController extends Controller
{
    public function index(StatusChart $chart)
    {
        return view('statuslog', ['chart' => $chart->build()]);
    }
}
