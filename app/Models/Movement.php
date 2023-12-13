<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_FROMACCOUNT',
        'ID_TOMACCOUNT',
        'CONCEPT',
        'QUANTITY'
    ];
}
