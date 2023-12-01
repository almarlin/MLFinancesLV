<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $adminUser = new User();
        $adminUser->NIF = 000000000;
        $adminUser->NAME = 'admin';
        $adminUser->SURNAME = 'admin';
        $adminUser->email = 'admin@admin.com';
        $adminUser->password = Hash::make('admin');
        $adminUser->ADMIN = true;

        $adminUser->save();


        \App\Models\UserAccount::factory(10)->create();
    }
}
