<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transcation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TranscationFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menggunakan factory TranscationFactory untuk membuat 100 transaksi
        \Database\Factories\TranscationFactory::new()->count(100)->create();
    }
}
