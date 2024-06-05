<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\BarChart; // Import the BarChart class
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FaktaPengiriman;

class SudahDikonfirmasi
{
    protected $chart;

    public function __construct(BarChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($labels, $values): BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Distribusi Status Sudah Dikonfirmasi')
            ->setSubtitle('Berdasarkan Jumlah Pesanan yang Sudah Dikonfirmasi')
            ->addData('Jumlah Sudah Dikonfirmasi', $values->toArray())
            ->setColors(['#99C2A5'])
            ->setXAxis($labels->toArray());
    }
}
