<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_1 = User::create([
            'first_name' => 'Ousman',
            'last_name' => 'Camara',
            'email' => 'camaraousman99@gmail.com',
            'username'  => 'camaraousman',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);
        $user_2 = User::create([
            'first_name' => 'Oussama',
            'last_name' => 'Mekkioui',
            'email' => 'mekkioui.oussama@gmail.com',
            'username'  => 'oussamamekkioui',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        Media::create([
           'user_id' => $user_1->id
        ]);
        Media::create([
            'user_id' => $user_2->id
        ]);
    }
}
