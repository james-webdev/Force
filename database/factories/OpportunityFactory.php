<?php

namespace Database\Factories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'close_date' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'account_id' => $this->faker->numberBetween(1, 12), 
            'user_id' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'status' => $this->faker->numberBetween($min = 0, $max = 2),
            'value' =>  $this->faker->numberBetween($min = 500000, $max = 20000000),
            'stage_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
