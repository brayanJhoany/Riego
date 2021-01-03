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
            'nombre'=>$this->faker->name,
            'texturaDeSuelo_id'=>TexturaDelSuelo::all()->random()->id,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
