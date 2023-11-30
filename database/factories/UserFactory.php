<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'id'=>$this->factoryForModel('User'),
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
            'PROFILEPHOTO',
            'remember_token'
        ];
    }
}
