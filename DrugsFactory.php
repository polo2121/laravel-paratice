<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Drugs;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\drugs>
 */
class DrugsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Drugs::class;

    public function definition()
    {
        // $faker = Factory::create();
        return [
            'drug_name' => $this->faker->name(),
            'drug_ml' => $this->faker->name(),
            'drug_amount' =>  $this->faker->numerify('##'),
            'drug_price' =>  $this->faker->numerify('###'),
            'created_at' =>  $this->faker->date('Y-m-d'),
            'updated_at' =>  $this->faker->date('Y-m-d')
        ];
    }
}
