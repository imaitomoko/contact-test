<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'email' => $this->faker->safeEmail,
            'zip11' => $this->faker->postcode,
            'addr11' => $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'opinion' => $this->faker-> realText(120)
        ];
    }
}
