<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\BarChart; // Import the BarChart class
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FaktaPengiriman;

class SudahSampai
{
    protected $chart;

    public function __construct(BarChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($labels, $values): BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Distribusi Status Sudah Sampai')
            ->setSubtitle('Berdasarkan Jumlah Pesanan yang Sudah Sampai')
            ->addData('Jumlah Sudah Sampai', $values->toArray())
            ->setColors(['#FDC0FC'])
            ->setXAxis($labels->toArray());
    }
}
