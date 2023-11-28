<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'ID_USER'; // Nombre de la clave primaria

    protected $fillable = [
        'NIF', 'NAME', 'SURNAME', 'AGE', 'COUNTRY','PROVINCE','CITY','PC','ADDRESS','PHONENUMBER','HASH', 'BAN', 'ADMIN', 'PROFILEPHOTO'
    ];

    protected $hidden = [
        'HASH', 'remember_token',
    ];
    public function getKeyName()
    {
        return 'NIF';
    }
}
