<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            "name"=> "Brayan Escobar",
            "email"=> "brayan.escobar@live.com",
            "password"=> bcrypt("123456789")
         ]);
    }
}
