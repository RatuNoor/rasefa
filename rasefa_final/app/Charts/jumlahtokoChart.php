<?php

namespace App\Charts;

use App\Models\fakta_penjualan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class jumlahtokoChart
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
        $datajumlahPesanan = [];

        $toko_harga = fakta_penjualan::query()
            ->selectRaw('nama_toko, COUNT(jumlah_pesanan_produk) as jumlah_pesanan')
            ->groupBy('nama_toko')
            ->get();

        // Tambahkan data ke variabel yang akan digunakan
        foreach ($toko_harga as $data) {
            $data_toko[] = $data->nama_toko;
            $datajumlahPesanan[] = $data->jumlah_pesanan;
        }
        
        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Toko')
            ->setSubtitle('Berdasarkan Jumlah Pesanan')
            ->addData('Jumlah Pesanan', $datajumlahPesanan)
            ->setXAxis($data_toko);
    }

}