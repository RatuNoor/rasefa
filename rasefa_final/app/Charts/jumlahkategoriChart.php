<?php

namespace App\Charts;
use App\Models\fakta_penjualan;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class jumlahkategoriChart
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
        $jumlah_pesanan=[];

        $jumlah_kategori = fakta_penjualan::query()
            ->selectRaw('kategori_produk, COUNT(jumlah_pesanan_produk) as jumlah_pesanan')
            ->groupBy('kategori_produk')
            ->get();

        foreach ($jumlah_kategori as $data) {
            $kategori_produk[] = $data->kategori_produk;
            $datajumlahPesanan[] = $data->jumlah_pesanan;
        }
        
        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Kategori')
            ->setSubtitle('Berdasarkan Jumlah Pesanan')
            ->addData('Jumlah Pesanan', $datajumlahPesanan)
            ->setXAxis($kategori_produk);
    }


}
