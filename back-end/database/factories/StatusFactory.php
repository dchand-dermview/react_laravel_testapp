<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = $this->faker->randomElement(
            array(
                array("USER_ACTIVE", "Active"),
                array("USER_DISABLED", "Disabled"),
                array("USER_REJECTED", "Rejected")
            )
        );

        return [
            'tag' => $data[0],
            'description' => $data[1],
        ];
    }
}
