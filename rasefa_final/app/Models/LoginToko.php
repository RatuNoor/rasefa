<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Model; 
class LoginToko extends Model
{
    use HasFactory;
    protected $table = 'toko'; // Nama tabel yang sesuai
    protected $primaryKey = 'id_toko';

    protected $fillable = ['email','password'];
}
