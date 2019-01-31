<?php

use Illuminate\Database\Seeder;
use App\OrderHistory;

class OrderHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderHistory::class, 5)->create();
    }
}
