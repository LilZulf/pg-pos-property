<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TranscationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transactionTypes = ['bri', 'bni', 'mandiri'];

        return [
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'order_id' => $this->faker->unique()->uuid,
            'status' => $this->faker->randomElement(['Success', 'Pending', 'Failed']),
            'amount' => $this->faker->randomFloat(2, 50000, 1000), // Jumlah minimal diatur menjadi 50.000
            'customer_email' => $this->faker->unique()->safeEmail,
            'transaction_type' => 'Virtual Account',
            'channel' => $this->faker->randomElement($transactionTypes),
        ];
    }
}
