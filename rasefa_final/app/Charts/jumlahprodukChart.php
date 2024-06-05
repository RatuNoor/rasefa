<?php

namespace App\Charts;
use App\Models\fakta_penjualan;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class jumlahprodukChart
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
        $jumlah_pesanan=[];

        $produk_harga = fakta_penjualan::query()
            ->selectRaw('nama_produk, COUNT(jumlah_pesanan_produk) as jumlah_pesanan')
            ->groupBy('nama_produk')
            ->get();

        foreach ($produk_harga as $data) {
            $data_produk[] = $data->nama_produk;
            $datajumlahPesanan[] = $data->jumlah_pesanan;
        }
        
        return $this->chart->barChart()
            ->setTitle('Data Penjualan Per-Produk')
            ->setSubtitle('Berdasarkan Jumlah Pesanan')
            ->addData('Jumlah Pesanan', $datajumlahPesanan)
            ->setXAxis($data_produk);
    }


}
