<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

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
        'passsword',
        'BAN',
        'ADMIN',
        'PROFILEPHOTO'
    ];
    protected $hidden = [
        'HASH',
        'remember_token'
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }


}
