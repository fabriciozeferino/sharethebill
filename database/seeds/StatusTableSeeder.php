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
        DB::table('statuses')->insert([
            [
                'description' => 'Opened',
                'created_at' => now()
            ],
            [
                'description' => 'Shared',
                'created_at' => now()
            ],
            [
                'description' => 'Paid',
                'created_at' => now()
            ]
        ]);
    }
}
