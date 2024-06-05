<?php

// app/Charts/StatusChart.php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\PieChart;
use App\Models\FaktaPengiriman;

class StatusChart
{
    protected $chart;

    public function __construct(PieChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): PieChart
    {
        $data = FaktaPengiriman::select('status', \DB::raw('count(*) as jumlah'))
            ->groupBy('status')
            ->get();

        $this->chart->setTitle('Distribusi Status Pengiriman')
            ->setSubtitle('Berdasarkan Status')
            ->addData($data->pluck('jumlah')->toArray())
            ->setLabels($data->pluck('status')->toArray())
            ->setColors(['#3490dc', '#38c172', '#e3342f', '#9561e2']); 

        return $this->chart;
    }
}
