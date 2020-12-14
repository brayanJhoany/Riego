<?php

namespace Database\Factories;

use App\Models\Campo;
use App\Models\TexturaDelSuelo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->title,
            'ref_tipoDeSuelo'=>TexturaDelSuelo::all()->random()->id,
            'ref_idUsuario'=>User::all()->random()->id,
        ];
    }
}
