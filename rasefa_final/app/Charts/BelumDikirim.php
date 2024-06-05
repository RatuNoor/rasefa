<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\BarChart;
use App\Models\FaktaPengiriman;

class BelumDikirim
{
    protected $chart;

    public function __construct(BarChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($labels, $values): BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Distribusi Status Belum Dikirim')
            ->setSubtitle('Berdasarkan Jumlah Pesanan yang Belum Dikirim')
            ->addData('Jumlah Belum Dikirim', $values->toArray())
            ->setColors(['#FDC0D9'])
            ->setXAxis($labels->toArray());
    }
}
