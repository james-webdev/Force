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
            'title' => $this->faker->title,
            'expected_close' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'actual_close' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'account_id' => function () {
                return factory(App\Models\Account::class)->create()->id;
            }, 
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'status' => $this->faker->numberBetween($min = 0, $max = 2),
            'value' =>  $this->faker->numberBetween($min = 500000, $max = 20000000),
        ];
    }
}
