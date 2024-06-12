<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuizSession;

class QuizSessionSeeder extends Seeder
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
                'token' => 'S39O3N',
                'quiz_id' => 1,
                'created_by' => 1,
                'started_at' => null,
                'ended_at' => null,
                'is_open' => true,
                'created_at' => now(),
            ]
        ];

        QuizSession::insert($data);
    }
}
