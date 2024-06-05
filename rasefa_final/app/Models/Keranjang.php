<?php

namespace App\Models;

use App\Models\Toko;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    public $timestamps = false;

    protected $fillable = [
        'id_pembeli',
        'id_produk',
        'id_toko',
        'kuantitas',
        // tambahkan kolom lain yang sesuai
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

}
