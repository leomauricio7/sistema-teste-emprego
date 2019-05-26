<?php

use Illuminate\Database\Seeder;
use App\user;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name'      =>  'Administrativo',
            'email'     =>  'admin@gmail.com',
            'tipo'      =>  'admin',
            'password'  =>  bcrypt('123mudar'),
        ]);
    }
}
