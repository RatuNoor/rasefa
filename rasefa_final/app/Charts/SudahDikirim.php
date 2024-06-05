<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\BarChart; // Import the BarChart class
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FaktaPengiriman;

class SudahDikirim
{
    protected $chart;

    public function __construct(BarChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($labels, $values): BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Distribusi Status Sudah Dikirim')
            ->setSubtitle('Berdasarkan Jumlah Pesanan yang Sudah Dikirim')
            ->addData('Jumlah Sudah Dikirim', $values->toArray())
            ->setColors(['#DC8CEE'])
            ->setXAxis($labels->toArray());
    }
}
