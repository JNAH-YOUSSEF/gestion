<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => fake()->randomNumber(),
            'fullname' => fake()->name(),
            'depart' => fake()->word(),
            'hire_date' =>  fake()->date(),
            'phone' =>  fake()->numberBetween(),
            'address' =>  fake()->address(),
            'city' =>  fake()->city(),

        ];
    }
}
