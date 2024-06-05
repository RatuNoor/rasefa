<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = ['id_order'];
    protected $table = 'pesanan';
    public $timestamps = false;
}
