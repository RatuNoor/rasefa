<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'pembeli'; // Nama tabel yang sesuai

    protected $fillable = ['username', 'nama', 'email', 'alamat', 'no_telfon','password'];
}
