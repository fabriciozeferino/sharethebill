<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'type' => 'Dinner',
                'created_at' => now()

            ],
            [
                'type' => 'Travel',
                'created_at' => now()

            ],
            [
                'type' => 'Restaurant',
                'created_at' => now()

            ],
            [
                'type' => 'Goods',
                'created_at' => now()

            ]
        ]);
    }
}
