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
        User::factory()->create([
            "name"=> "Brayan Escobar",
            "rol_id"=>2,//le asignamos el rol de usuario
            "email"=> "brayan.escobar@live.com",
            "password"=> bcrypt("123456789")
         ]);

         User::factory()->create([
            "name"=> "admin",
            "rol_id"=>1,//le asignamos el rol de administrador
            "email"=> "admin@admin.com",
            "password"=> bcrypt("123456789")
         ]);
    }
}
