<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'title' => 'mr',
            'name' => 'John',
            'last_name' => 'Doe',
            'address' => 'Fake Street 123',
            'zip_code' => '06020',
            'city' => 'McAlester',
            'state' => 'OK',
            'email' => 'john@email.com'
        ]);

        DB::table('clients')->insert([
            'title' => 'ms',
            'name' => 'Jane',
            'last_name' => 'Doe',
            'address' => 'Fake Street 234',
            'zip_code' => '11820',
            'city' => 'Tulsa',
            'state' => 'OK',
            'email' => 'jane@email.com'
        ]);

    }
}
