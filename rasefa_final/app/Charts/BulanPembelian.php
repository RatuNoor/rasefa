<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactPembelian;

class BulanPembelian
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $dataBulan = [];
        $jumlahPesanan = [];

        $monthlyData = FactPembelian::query()
            ->selectRaw('bulan, COUNT(*) as jumlah_pesanan')
            ->groupBy('bulan')
            ->get();

        foreach ($monthlyData as $data) {
            $dataBulan[] = \Carbon\Carbon::create()->month($data->bulan)->format('F');
            $jumlahPesanan[] = $data->jumlah_pesanan;
        }

        return $this->chart->lineChart()
            ->setTitle('Jumlah Pesanan Produk Bulanan')
            ->setSubtitle('Jumlah pesanan tiap bulan')
            ->addData('jumlah pesanan', $jumlahPesanan)
            ->setColors(['#A7CEE1'])
            ->setHeight(400)
            ->setXAxis($dataBulan);
    }
}
