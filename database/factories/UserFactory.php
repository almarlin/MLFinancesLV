<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'NIF'=>$this->faker->randomNumber(8),
            'NAME'=>$this->faker->name(),
            'SURNAME'=>$this->faker->numerify(),
            'email'=>$this->faker->email(),
            'AGE'=>$this->faker->randomNumber(2),
            'BIRTHDAY'=>$this->faker->date('y-m-d'),
            'COUNTRY'=>$this->faker->lexify(),
            'PROVINCE'=>$this->faker->lexify(),
            'CITY'=>$this->faker->lexify(),
            'PC'=>$this->faker->randomNumber(5),
            'ADDRESS'=>$this->faker->sentence(),
            'PHONENUMBER'=>$this->faker->randomNumber(9),
            'password'=>Hash::make('1234'),
            'BAN'=>0,
            'ADMIN'=>0,
            'PROFILEPHOTO'=>$this->faker->lexify(),
            'remember_token'=>0,
        ];
    }
}
