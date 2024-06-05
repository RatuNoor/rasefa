<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactPembelian;

class KuartalPembelian1
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dataKuartal = [];
        $datatotalHarga = [];

        $quarterlyData = FactPembelian::query()
            ->selectRaw('kuartal, SUM(total_harga) as total_harga')
            ->groupBy('kuartal')
            ->get();

        foreach ($quarterlyData as $data) {
            $dataKuartal[] = $data->kuartal;
            $datatotalHarga[] = $data->total_harga;
        }

        return $this->chart->barChart()
            ->setTitle('Data total harga pembelian Berdasarkan Kuartal')
            ->setSubtitle('total harga tiap kuartal')
            ->addData('total harga', $datatotalHarga)
            ->setColors(['#ADD3D0'])
            ->setHeight(400)
            ->setXAxis($dataKuartal);
    }
}
