<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Drivers;
use App\Models\Import;
use App\Models\Users;

class ImportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Import::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_dossier' => $this->faker->numberBetween(-10000, 10000),
            'manifeste' => $this->faker->word,
            'date' => $this->faker->date(),
            'driver_id' => Drivers::factory(),
            'mat_camion' => $this->faker->word,
            'mat_remorque' => $this->faker->word,
            'compagne' => $this->faker->word,
            'navire' => $this->faker->word,
            'provenance' => $this->faker->word,
            'destination' => $this->faker->word,
            'date_arrivée' => $this->faker->date(),
            'date_sortie' => $this->faker->date(),
            'observation' => $this->faker->word,
            'tarre' => $this->faker->randomFloat(0, 0, 9999999999.),
            'poid_brut' => $this->faker->randomFloat(0, 0, 9999999999.),
            'nbr_colis' => $this->faker->numberBetween(-10000, 10000),
            'frais_peage' => $this->faker->randomFloat(0, 0, 9999999999.),
            'frais_TMSA' => $this->faker->randomFloat(0, 0, 9999999999.),
            'montant_fret' => $this->faker->randomFloat(0, 0, 9999999999.),
            'devise' => $this->faker->randomFloat(0, 0, 9999999999.),
            'cours' => $this->faker->word,
            'type' => $this->faker->word,
            'user_id' => Users::factory(),
        ];
    }
}
