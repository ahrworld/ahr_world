<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $number) {
             DB::table('users')->insert([
            'status' => 0,
            'email' => $number.str_random(3).'@gmail.com',
            'password' => bcrypt('dsadsa'),
            'data_status' => 0,
            ]);

        }
    }
}
