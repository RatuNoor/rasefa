<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactPembelian;

class KuartalPembelian
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $dataBulan = [];
        $datatotalHarga = [];

        $monthlyData = FactPembelian::query()->selectRaw('bulan, SUM(total_harga) as total_harga')
            ->groupBy('bulan')
            ->get();

        foreach ($monthlyData as $data) {
            $dataBulan[] = \Carbon\Carbon::create()->month($data->bulan)->format('F');
            $datatotalHarga[] = $data->total_harga;
        }

        return $this->chart->lineChart()
            ->setTitle('Data total harga pembelian Bulanan')
            ->setSubtitle('total harga tiap bulanna')
            ->addData('total harga', $datatotalHarga)
            ->setColors(['#E4B0C2'])
            ->setHeight(400)
            ->setXAxis($dataBulan);
    }
}
