<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAccount>
 */
class UserAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = UserAccount::class;
    public function definition(): array
    {
        // Para relacionar una cuenta con su usuario en la factory, llamamos al método factory y crea una instancia de user y account.
        // Automáticamente guarda el id en la tabla relacional.
        return [
            'ID_USER' => User::factory(),
            'ID_ACCOUNT' => Account::factory(),
        ];
    }
}
