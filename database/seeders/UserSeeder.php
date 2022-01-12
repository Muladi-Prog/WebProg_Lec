<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Goldius Leonard',
            'gender' => 'Male',
            'dob' => '2001-11-17',
            'username' => 'goldiusleonard',
            'email' => 'goldius.leonard@binus.ac.id',
            'password' => Hash::make('goldius123'),
            'roles_id' => 1,
        ],[
            'name' => 'Mario Christanto',
            'gender' => 'Male',
            'dob' => '2001-12-10',
            'username' => 'mariochristanto',
            'email' => 'mario.christanto@binus.ac.id',
            'password' => Hash::make('mario123'),
            'roles_id' => 2,
        ],[
            'name' => 'Enricko Gregorio',
            'gender' => 'Female',
            'dob' => '2001-08-20',
            'username' => 'enrickogregorio',
            'email' => 'enricko.gregorio@binus.ac.id',
            'password' => Hash::make('enricko123'),
            'roles_id' => 3,
        ]]);
    }
}
