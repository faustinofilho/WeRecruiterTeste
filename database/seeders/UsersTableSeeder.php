<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Faustino Tavares de Santana',
                'email'          => 'faustino.tsf@gmail.com',
                'password'       => bcrypt('19182837'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
