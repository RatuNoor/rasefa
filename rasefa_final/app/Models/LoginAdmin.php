<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
class LoginAdmin extends Model
{
    use HasFactory;
    protected $table = 'admin'; 
    protected $primaryKey = 'id_admin';
    protected $fillable = ['email','password'];
}
