<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model; 

class LoginPembeli extends Model 
{
    use HasFactory;
    
    protected $table = 'pembeli'; // Nama tabel yang sesuai
    protected $primaryKey = 'id_pembeli';
    protected $fillable = ['email','password'];
}
