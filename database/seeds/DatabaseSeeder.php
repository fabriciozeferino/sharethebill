<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(BillUserTableSeeder::class);
    }
}
