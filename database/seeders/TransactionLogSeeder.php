<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 log untuk 4 data transaksi pertama
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                TransactionLog::create([
                    'source' => 'source_' . $i,
                    'payload' => 'payload_' . $i,
                    'result' => 'result_' . $i,
                    'transaction_id' => $i,
                ]);
            }
        }

        // Membuat 2 log untuk data transaksi berikutnya
        for ($i = 5; $i <= 20; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                TransactionLog::create([
                    'source' => 'source_' . $i,
                    'payload' => 'payload_' . $i,
                    'result' => 'result_' . $i,
                    'transaction_id' => $i,
                ]);
            }
        }
    }
}
