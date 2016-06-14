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
        foreach (range(1,20) as $number) {
            DB::table('users')->insert([
            'status' => 1,
            'email' => $number.str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            ]);
        }
    }
}
