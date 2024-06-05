<?php

// app/Charts/PengirimanChart.php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FaktaPengiriman;

class PengirimanChart
{
    protected $chart;

    public function __construct(BarChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): BarChart
    {
        $data = FaktaPengiriman::select('nama_logistik', \DB::raw('count(*) as jumlah_pengiriman'))
            ->groupBy('nama_logistik')
            ->orderBy('jumlah_pengiriman', 'asc') 
            ->get();

        $this->chart->setTitle('Jumlah Pengiriman per Logistik')
            ->setSubtitle('Berdasarkan Nama Logistik')
            ->addData('Jumlah Pengiriman', $data->pluck('jumlah_pengiriman')->toArray())
            ->setXAxis($data->pluck('nama_logistik')->toArray());

        return $this->chart;
    }
}


