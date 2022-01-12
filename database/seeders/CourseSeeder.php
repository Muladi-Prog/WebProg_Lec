<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([[
            'name' => 'Algorithm & Programming'
        ],[
            'name' => 'Human Computer Interaction'
        ],[
            'name' => 'Program Design Method'
        ],[
            'name' => 'Computer Vision'
        ],[
            'name' => 'Web programming'
        ],[
            'name' => 'Mobile Programming'
        ],[
            'name' => 'Database Mining'
        ],[
            'name' => 'Algorithm Design & Analysis'
        ],[
            'name' => 'CB Pancasila'
        ],[
            'name' => 'CB Kewarganegaraan'
        ],[
            'name' => 'CB Agama'
        ]]);
    }
}
