<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => "zeronex",
            'isAdmin' => True,
            'address' => "Jalan batu rusa 5",
            'phone' => "08123456789",
            'email' => "ekin.tanuwijaya@gmail.com",
            'password' => bcrypt("1234567")
        ]);
    }
}
