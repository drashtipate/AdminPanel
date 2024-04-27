<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Feedback extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $connection = 'mongodb';
    protected $collection = 'feedback';

    protected $fillable = [
        'email', 'message','datetime'
    ];

    public $timestamps = false;
}
