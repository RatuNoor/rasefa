<?php

namespace App\Charts;

use App\Models\fakta_penjualan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TokoChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Menggunakan pluck
        $nama_toko = fakta_penjualan::pluck('nama_toko');

        $data_toko = [];
        $datatotalHarga = [];

        $toko_harga = fakta_penjualan::query()
            ->selectRaw('nama_toko, SUM(total_harga) as total_harga')
            ->groupBy('nama_toko')
            ->get();

        // Tambahkan data ke variabel yang akan digunakan
        foreach ($toko_harga as $data) {
            $data_toko[] = $data->nama_toko;
            $datatotalHarga[] = $data->total_harga;
        }

        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Toko')
            ->setSubtitle('Berdasarkan Total Pemasukkan')
            ->addData('Total Harga', $datatotalHarga)
            ->setXAxis($data_toko);
    }

}