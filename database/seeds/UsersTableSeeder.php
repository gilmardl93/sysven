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
        User::create(['username' => 'gmoreno', 'password' => bcrypt('123456'), 'nombres' => 'Gilmar Marquez', 'paterno' => 'Moreno', 'materno' => 'Mejia', 'idtienda' => 1, 'idrol' => 1]);
    }
}
