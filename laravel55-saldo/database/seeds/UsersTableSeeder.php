<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Isaias',
        	'email' => 'isaiaszmendes@email.com',
        	'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Outro Usuario',
            'email' => 'teste@email.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
