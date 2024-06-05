<?php

namespace App\Charts;
use App\Models\fakta_penjualan;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class totalkategoriChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\barChart
    {
        // Menggunakan pluck
        $kategori_produk = fakta_penjualan::pluck('kategori_produk');

        $kategori_produk=[];
        $total_harga=[];

        $produk_harga = fakta_penjualan::query()
            ->selectRaw('kategori_produk, SUM(total_harga) as total_harga')
            ->groupBy('kategori_produk')
            ->get();

        foreach ($produk_harga as $data) {
            $kategori_produk[] = $data->kategori_produk;
            $datatotalHarga[] = $data->total_harga;
        }
        
        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Kategori')
            ->setSubtitle('Berdasarkan Total Pemasukkan')
            ->addData('Total Harga', $datatotalHarga)
            ->setXAxis($kategori_produk);
    }


}
