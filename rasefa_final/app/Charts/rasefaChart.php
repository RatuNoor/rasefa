<?php

namespace App\Charts;
use App\Models\fakta_penjualan;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class rasefaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\barChart
    {
        // Menggunakan pluck
        $nama_produk = fakta_penjualan::pluck('nama_produk');

        $data_produk=[];
        $total_harga=[];

        $produk_harga = fakta_penjualan::query()
            ->selectRaw('nama_produk, SUM(total_harga) as total_harga')
            ->groupBy('nama_produk')
            ->get();

        foreach ($produk_harga as $data) {
            $data_produk[] = $data->nama_produk;
            $datatotalHarga[] = $data->total_harga;
        }
        
        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Produk')
            ->setSubtitle('Berdasarkan Total Pemasukkan')
            ->addData('Total Harga', $datatotalHarga)
            ->setXAxis($data_produk);
    }


}
