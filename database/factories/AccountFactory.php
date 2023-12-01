<?php

namespace Database\Factories;

use App\Http\Controllers\AccountController;
use App\Models\Account;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Account::class;

    public function definition(): array
    {
        return [
            'BALANCE' => 300,
            'IBAN' => app(AccountController::class)->generateIban($this->faker->name)
        ];
    }
}
