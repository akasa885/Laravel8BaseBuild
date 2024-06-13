<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kuisioner = [
            "Dalam sebulan terakhir, seberapa sering Anda merasa kesal karena sesuatu yang terjadi secara tak terduga?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa tidak mampu mengendalikan hal-hal penting dalam hidup Anda?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa gugup dan stres?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa yakin tentang kemampuan Anda menangani masalah pribadi?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa bahwa segala sesuatu berjalan sesuai keinginan Anda?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa tidak mampu mengatasi semua hal yang harus Anda lakukan?",
            "Dalam sebulan terakhir, seberapa sering Anda mampu mengendalikan gangguan dalam hidup Anda?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa berada di atas segala sesuatu?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa marah karena hal-hal yang terjadi di luar kendali Anda?",
            "Dalam sebulan terakhir, seberapa sering Anda merasa kesulitan menumpuk begitu tinggi sehingga Anda tidak dapat mengatasinya?"
        ];

        $options = [
            0 => [
                'label' => 'Tidak pernah',
                'value' => 0
            ],
            1 => [
                'label' => 'Hampir tidak pernah',
                'value' => 1
            ],
            2 => [
                'label' => 'Kadang-kadang',
                'value' => 2
            ],
            3 => [
                'label' => 'Cukup sering',
                'value' => 3
            ],
            4 => [
                'label' => 'Sangat sering',
                'value' => 4
            ],
        ];

        $optionsInverted = [
            0 => [
                'label' => 'Tidak pernah',
                'value' => 4
            ],
            1 => [
                'label' => 'Hampir tidak pernah',
                'value' => 3
            ],
            2 => [
                'label' => 'Kadang-kadang',
                'value' => 2
            ],
            3 => [
                'label' => 'Cukup sering',
                'value' => 1
            ],
            4 => [
                'label' => 'Sangat sering',
                'value' => 0
            ],
        ];

        $data = [
            [
                'id' => 1,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[0],
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[1],
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[2],
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($optionsInverted),
                'question' => $kuisioner[3],
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($optionsInverted),
                'question' => $kuisioner[4],
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[5],
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($optionsInverted),
                'question' => $kuisioner[6],
                'created_at' => now(),
            ],
            [
                'id' => 8,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($optionsInverted),
                'question' => $kuisioner[7],
                'created_at' => now(),
            ],
            [
                'id' => 9,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[8],
                'created_at' => now(),
            ],
            [
                'id' => 10,
                'quiz_id' => 1,
                'type' => 'radio',
                'options' => json_encode($options),
                'question' => $kuisioner[9],
                'created_at' => now(),
            ],
        ];

        Question::insert($data);
    }
}
