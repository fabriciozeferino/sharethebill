<?php

use Illuminate\Database\Seeder;

class BillUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_user')->insert([
            [
                'user_id' => 1,
                'bill_id' => 1,
                'spend' => 95.55,
                'created_at' => now()

            ],
            [
                'user_id' => 2,
                'bill_id' => 1,
                'spend' => 195.55,
                'created_at' => now()

            ],
            [
                'user_id' => 3,
                'bill_id' => 1,
                'spend' => 35.55,
                'created_at' => now()

            ]
        ]);
    }
}
