<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Logistik extends Model
{
    use Authenticatable;
    use HasFactory;
    protected $table = 'logistik';
    protected $primaryKey = 'id_logistik'; 
    protected $fillable = ['nama_logistik', 'username_logistik', 'password', 'email'];
}
