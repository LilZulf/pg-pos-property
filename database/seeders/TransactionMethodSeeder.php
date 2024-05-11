<?php

namespace Database\Seeders;

use App\Models\TransactionMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionMethods = [
            'Virtual Account',
            'QRIS',
        ];

        foreach ($transactionMethods as $method) {
            TransactionMethod::create([
                'name' => $method,
                'is_active' => true,
            ]);
        }
    }
}
