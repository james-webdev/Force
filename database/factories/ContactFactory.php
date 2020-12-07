<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
                'user_id'=> $this->faker->numberBetween(1, 5),
                'account_id'=> Account::factory(),
                'firstname' => $this->faker->firstName,
                'lastname' => $this->faker->lastName,
                'address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state'=> $this->faker->stateAbbr,
                'zipcode' => $this->faker->postcode,
                'email' => $this->faker->safeEmail,
                'phone' => $this->faker->phoneNumber,
                'title' => $this->faker->jobTitle                
            ];

    }
}
