<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactPembelian;

class KuartalPembelian2
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('total pembelian tiap kuartal')
            ->addData('total_pembelian', [FactPembelian::where('kuartal', '=', 'Q1')->count(), 
            FactPembelian::where('kuartal', '=', 'Q2')->count(),
            FactPembelian::where('kuartal', '=', 'Q3')->count(),
            FactPembelian::where('kuartal', '=', 'Q4')->count()])
            ->setXAxis(['Q1', 'Q2', 'Q3', 'Q4'])
            ->setColors(['#AB7FB2', '#A7CEE1', '#E4B0C2', '#ADD3D0']);
    }
}
