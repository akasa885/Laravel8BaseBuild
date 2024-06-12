<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Instrumen Penilaian Stres',
                'description' => 'Instrumen ini digunakan untuk menilai tingkat stres seseorang',
                'minutes' => null,
                'status' => 'published',
                'user_id' => 1,
                'created_at' => now(),
            ]
        ];

        Quiz::insert($data);
    }
}
