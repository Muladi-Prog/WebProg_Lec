<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'courses_id' => 1,
                'users_id' => 1,
                'title' => 'Apakah ini sudah dilaksanakan?',
                'description' => 'Saya sudah mencari kesana kemari untuk informasi ini. Tolong diperjelas!'
            ],[
                'courses_id' => 1,
                'users_id' => 1,
                'title' => 'Apakah ini sudah berjalan?',
                'description' => 'Saya sudah mencari kesana kemari untuk informasi ini. Tolong diperjelas!'
            ]
            ,[
                'courses_id' => 2,
                'users_id' => 1,
                'title' => 'Post3',
                'description' => 'informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi informasi '
            ]
            ,[
                'courses_id' => 3,
                'users_id' => 1,
                'title' => 'Post4',
                'description' => 'kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana kesana '
            ]
            ,[
                'courses_id' => 4,
                'users_id' => 1,
                'title' => 'Post5',
                'description' => 'Samencari mencari mencari mencari mencari mencari mencari mencari mencari mencari mencari mencari mencari mencari '
            ]
            ,[
                'courses_id' => 5,
                'users_id' => 1,
                'title' => 'Post6',
                'description' => 'sudah sudah sudah sudah sudah sudah sudah sudah sudah sudah '
            ]
            ,[
                'courses_id' => 6,
                'users_id' => 1,
                'title' => 'Post7',
                'description' => 'saya saya saya saya saya saya saya saya saya saya saya saya '
            ]
            ,[
                'courses_id' => 7,
                'users_id' => 1,
                'title' => 'Lorem ipsum',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'
            ]
        ]);
    }
}
