<?php

namespace Database\Seeders;

use App\Models\Campo;
use Illuminate\Database\Seeder;

class CampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campo::factory(10)->create();
        //Campo::factory(10)->create();
        //Campo::factory(10)->create();
    }
}
