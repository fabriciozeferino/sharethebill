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
                'status_id' => 1,
                'created_at' => now()

            ],
            [
                'type_id' => 2,
                'status_id' => 1,
                'created_at' => now()

            ],
            [
                'type_id' => 2,
                'status_id' => 1,
                'created_at' => now()

            ]
        ]);
    }
}
