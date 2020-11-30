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
            'called'=> $faker->boolean,
            'met'=> $faker->boolean,
            'proposed'=> $faker->boolean,
            'assisted'=> $faker->boolean,
            'comments' => $this->faker->realText(mt_rand(10, 20)),
        ];
    }
}
