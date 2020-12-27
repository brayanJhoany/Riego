<?php

namespace Database\Factories;

use App\Models\TexturaDelSuelo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TexturaDelSueloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TexturaDelSuelo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->unique()->name,
            'da'=>$this->faker->randomFloat(0,20),
            'cc'=>$this->faker->randomFloat(0,20),
            'pmp'=>$this->faker->randomFloat(0,20),
        ];
    }
}
