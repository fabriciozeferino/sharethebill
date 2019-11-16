<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'type_id' => 1,
                'amount' => 95.55,
                'status_id' => 1,
                'created_at' => now()

            ],
            [
                'type_id' => 2,
                'amount' => 195.55,
                'status_id' => 1,
                'created_at' => now()

            ],
            [
                'type_id' => 2,
                'amount' => 35.55,
                'status_id' => 1,
                'created_at' => now()

            ]
        ]);
    }
}
