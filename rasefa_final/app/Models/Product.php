<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'id_produk',
        'id_toko',
        'nama_produk',
        'kategori_produk',
        'harga_produk',
        'stok',
        'gambar_produk'
    ];
    

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
