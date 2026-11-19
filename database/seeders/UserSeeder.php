<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123)
        ]);
    }
}

User::create([
    'name'  => 'admin',
    'email'  => 'admin@gmail.com',
    'password'  => bcrypt(1234)
]);