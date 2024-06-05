<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Pembeli extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    protected $table = 'pembeli';
    protected $primaryKey = 'id_pembeli'; 
    protected $fillable = ['nama', 'alamat', 'no_telfon', 'email', 'password', 'username'];

    // ...
}

