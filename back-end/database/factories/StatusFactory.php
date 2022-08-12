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

        $tag = $this->faker->randomElement(['USER_ACTIVE', 'USER_DISABLED',  "USER_REJECTED"]);
        $description = $this->faker->randomElement(['Active', 'Disabled',  "Rejected"]);


//        $data = $this->faker->randomElement(array("USER_ACTIVE","Active"), array("USER_DISABLED","Disabled"), array("USER_REJECTED","Rejected"));

        return [
            'tag' => $tag,
            'description' => $description,
        ];
    }
}
