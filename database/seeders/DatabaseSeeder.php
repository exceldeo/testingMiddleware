<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
       public function run(): void
    {
        $user = [
            [
               'name'=>'ini akun Admin',
               'email'=>'admin@example.com',
                'role'=>'admin',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'ini akun User (non admin)',
               'email'=>'user@example.com',
                'role'=>'editor',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
