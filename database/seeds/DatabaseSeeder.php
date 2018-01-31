<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gustas',
            'gender' => '1',
            'email' => 'gusteakask@gmail.com',
            'password' => bcrypt('gustas'),
        ]);
    }
}
