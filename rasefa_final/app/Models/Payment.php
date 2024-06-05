<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'alamat',
        'no_telefon',
        'metode_pembayaran',
        'status',
        'no_rekening',
        'atas_nama',
        'total_pembayaran'
    ];

    protected $guarded = ['id'];
}
