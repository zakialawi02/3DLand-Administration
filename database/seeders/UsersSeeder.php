<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Contoh data dummy untuk pengguna
        $users = [
            ['name' => 'John Doe', 'email' => 'admin@mail.com', 'password' => bcrypt('admin'), 'roles' => 'admin'],
            ['name' => 'Jane Doe', 'email' => 'user@mail.com', 'password' => bcrypt('user'), 'roles' => 'user'],
        ];

        // Masukkan data ke dalam tabel 'users' menggunakan Query Builder
        DB::table('users')->insert($users);
    }
}
