<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomUser = \App\Models\User::inRandomOrder()->first();
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'visiting_salesman' => $randomUser->id,
            'visited' => fake()->boolean(),
        ];
    }
}