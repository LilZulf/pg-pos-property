<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ref' => 'REF' . fake()->unique()->numberBetween(100, 999),
            'status' => fake()->randomElement(['pending', 'completed', 'failed']),
            'amount' => fake()->randomFloat(2, 10, 1000),
            'user_id' => fake()->numberBetween(1, 10), // Assuming there are 10 users
            'transaction_method_id' => fake()->numberBetween(1, 5), // Assuming there are 5 transaction methods
            'meta' => json_encode(['note' => fake()->sentence]),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
