<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->randomElement(['admin', 'guest',  "super_admin"]);
        $permissions = $this->faker->randomElement(['userspage', 'adminspage']);

        return [
            'name' => $name,
            'permissions' => $permissions,
        ];
    }
}
