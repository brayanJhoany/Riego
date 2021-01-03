<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::factory()->create([
            'nombre'=>'Administrador',
            'descripcion'=>'Se le permite acceder a todo el sistema'
        ]);
        Rol::factory()->create([
            'nombre'=>'Regular',
            'descripcion'=>'solo tiene permitido ver su informacion'
        ]);
    }
}
