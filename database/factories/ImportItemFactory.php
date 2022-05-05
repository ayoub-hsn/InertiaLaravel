<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Clients;
use App\Models\ImportItem;
use App\Models\Imports;
use App\Models\Transitaires;

class ImportItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImportItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_position' => $this->faker->numberBetween(-10000, 10000),
            'type' => $this->faker->word,
            'client_id' => Clients::factory(),
            'importateur' => $this->faker->word,
            'exportateur' => $this->faker->word,
            'transitaire_id' => Transitaires::factory(),
            'marchandise' => $this->faker->word,
            'dum' => $this->faker->word,
            'nbr_colis' => $this->faker->numberBetween(-10000, 10000),
            'poid_brut' => $this->faker->randomFloat(0, 0, 9999999999.),
            'observation' => $this->faker->word,
            'import_id' => Imports::factory(),
        ];
    }
}
