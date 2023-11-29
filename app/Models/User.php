<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;

    protected $fillable = [
        'NIF',
        'NAME',
        'SURNAME',
        'AGE',
        'BIRTHDAY',
        'COUNTRY',
        'PROVINCE',
        'CITY',
        'PC',
        'ADDRESS',
        'PHONENUMBER',
        'HASH',
        'BAN',
        'ADMIN',
        'PROFILEPHOTO'
    ];
    protected $hidden = [
        'HASH',
        'remember_token'
    ];
}
