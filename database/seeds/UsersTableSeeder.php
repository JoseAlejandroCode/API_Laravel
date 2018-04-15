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
        //
        DB::table('users')->insert([
            'name' => 'Bernard',
            'email' => 'bernard@domain.com',
            'password' => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'Other',
            'email' => 'other@domain.com',
            'password' => bcrypt('987654321'),
        ]);
    }
}
