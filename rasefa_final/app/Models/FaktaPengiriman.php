<?php

// app/Models/FaktaPengiriman.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaktaPengiriman extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'fakta_pengiriman';


    protected $fillable = [
        'id_logistik',
        'sk_pengiriman',
        'nama_logistik',
        'status',
        'bulan',
        'kuartal',
        // Tambahkan atribut lain yang dapat diisi di sini sesuai kebutuhan
    ];

    // Jika Anda tidak menggunakan kolom created_at dan updated_at, tambahkan properti berikut
    public $timestamps = false;

    // Jika Anda ingin menambahkan kustom scope, misalnya untuk mencari berdasarkan nama logistik
    public function scopeSearchByNamaLogistik($query, $namaLogistik)
    {
        return $query->where('nama_logistik', $namaLogistik);
    }

    // Tambahan metode atau fungsi lain sesuai kebutuhan

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $allowedStatus = ['Belum Dikirim', 'Sudah Dikirim', 'Sudah Sampai', 'Sudah Dikonfirmasi'];

            if (!in_array($model->status, $allowedStatus)) {
                throw new \Exception('Status tidak valid.');
            }
        });
    }
}

