<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Contracts\Auth\Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
// use Jenssegers\Mongodb\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;
    
    protected $guard = 'admin';
    protected $collection = 'admins';
    public $timestamps = false;
    protected $fillable = [
        'email', 'password',
    ];
    
}
