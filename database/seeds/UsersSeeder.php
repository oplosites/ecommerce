<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@reineshop.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Muhammad Yusuf Maulana',
            'email' => 'yusufinthehouse@gmail.com',
            'password' => bcrypt('test'),
            'role' => 'buyer'
        ]);

    }
}
