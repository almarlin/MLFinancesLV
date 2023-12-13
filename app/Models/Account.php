<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_ACCOUNT',
        'BALANCE',
        'IBAN',
        'user_id'
    ];


    public function movements(): HasMany
    {
        return $this->hasMany(Movement::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
