<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female',  "other"]);
        //testing 5

        $startDate = '1970-00-00 00:00:00';
        $endDate = '2004-01-07 00:00:00';

        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $gender,
            'dob' => $this->faker->dateTimeBetween($startDate, $endDate),
            'role_id' => $this->faker->numberBetween(0, 10),
            'status_id' =>  $this->faker->numberBetween(0, 10)
        ];
    }
}
