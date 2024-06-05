<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class LoginLogistik extends Model
{
    use HasFactory;
    protected $table = 'logistik'; // Nama tabel yang sesuai
    protected $primaryKey = 'id_logistik';
    protected $fillable = ['email','password'];
}
