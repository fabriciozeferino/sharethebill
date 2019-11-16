<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fabricio Zeferino',
                'email' => 'fabriciozeferino@gmail.com',
                'password' => bcrypt('secret'),
                'created_at' => now()
            ],
            [
                'name' => 'Jade Coleman',
                'email' => 'jadecoleman@gmail.com',
                'password' => bcrypt('secret'),
                'created_at' => now()
            ],
            [
                'name' => 'Dominic Fox',
                'email' => 'dominicfox@gmail.com',
                'password' => bcrypt('secret'),
                'created_at' => now()
            ],
            [
                'name' => 'John Doe',
                'email' => 'jonhdoe@gmail.com',
                'password' => bcrypt('secret'),
                'created_at' => now()
            ]
        ]);
    }
}
