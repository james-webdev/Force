<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'activity_date' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'activity_type_id' => $this->faker->numberBetween(1, 5),
            'completed' => $this->faker->numberBetween(0, 1),
            'comments' => $this->faker->realText(mt_rand(10, 20)),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
