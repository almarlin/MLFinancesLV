<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    // De momento se queda en false para evitar conflictos. Otra opcion es anyadir las columnas de timestamps a la tabla.
    public $timestamps = false;

    protected $table = 'USER';
    protected $fillable = ['NAME', 'SURNAME',];
}
