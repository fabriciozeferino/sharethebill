<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'status' => 'Opened',
                'created_at' => now()
            ],
            [
                'status' => 'Shared',
                'created_at' => now()
            ],
            [
                'status' => 'Paid',
                'created_at' => now()
            ]
        ]);
    }
}
