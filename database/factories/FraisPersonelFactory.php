<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FraisPersonel;
use App\Models\Imports;

class FraisPersonelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FraisPersonel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'frais_auto' => $this->faker->randomFloat(0, 0, 9999999999.),
            'frais_tele' => $this->faker->randomFloat(0, 0, 9999999999.),
            'frais_gasoil' => $this->faker->randomFloat(0, 0, 9999999999.),
            'nbre_days' => $this->faker->numberBetween(-10000, 10000),
            'devplacement' => $this->faker->randomFloat(0, 0, 9999999999.),
            'frais_total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'import_id' => Imports::factory(),
        ];
    }
}
