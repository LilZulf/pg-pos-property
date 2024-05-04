<?php
namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Transaction::factory(150)->create();
    }
}
