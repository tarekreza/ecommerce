<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => "Mr. Admin",
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make(123456),
            'role'      => 2,
        ]);

        User::create([
            'name'      => "Mr. user",
            'email'     => 'user@gmail.com',
            'password'  => Hash::make(123456),
        ]);
    }
}
