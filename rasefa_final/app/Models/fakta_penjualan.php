<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakta_penjualan extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'fakta_penjualan';
    protected $primaryKey = 'sk_order'; 
    protected $fillable = ['total_harga', 'nama_produk', 'jumlah_pesanan_produk'];
}
