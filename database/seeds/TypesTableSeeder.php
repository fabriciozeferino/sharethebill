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
                'description' => 'Dinner',
                'created_at' => now()

            ],
            [
                'description' => 'Travel',
                'created_at' => now()

            ],
            [
                'description' => 'Restaurant',
                'created_at' => now()

            ],
            [
                'description' => 'Goods',
                'created_at' => now()

            ]
        ]);
    }
}
