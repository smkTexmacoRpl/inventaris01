<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insert([
        //admin
        [
            'name' =>  'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ],

        //superadmin
        [
            'name' =>  'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 2,
        ],

        //user
        [
            'name' =>  'User Biasa',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]
    ]);
    }
}
