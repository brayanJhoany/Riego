<?php

namespace Database\Seeders;

use App\Models\TexturaDelSuelo;
use Illuminate\Database\Seeder;

class TexturaDeSueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Arenoso',
            'da'=> 1.65,
            'cc'=>9.0,
            'pmp'=>4,
        ]);
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Franco-arenoso',
            'da'=> 1.50,
            'cc'=>14,
            'pmp'=>6,
        ]);
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Franco',
            'da'=> 1.25,
            'cc'=>19.5,
            'pmp'=>10,
        ]);
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Franco-arcilloso',
            'da'=> 1.25,
            'cc'=>27.0,
            'pmp'=>13,
        ]);
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Arcilloso-arenoso',
            'da'=> 1.30,
            'cc'=>31.0,
            'pmp'=>15,
        ]);
        TexturaDelSuelo::factory()->create([
            'nombre'=>'Arcilloso',
            'da'=> 1.30,
            'cc'=>35.0,
            'pmp'=>17,
        ]);
            
    }
}
