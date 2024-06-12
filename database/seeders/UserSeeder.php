<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
            ]
        ];

        User::insert($data);
    }
}
