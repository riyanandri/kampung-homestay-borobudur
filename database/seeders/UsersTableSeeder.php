<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Kampung Homestay Borobudur',
                'email' => 'kampunghomestay@gmail.com',
                'password' => Hash::make('admin@123'),
                'role' => 'admin',
                'status' => 'active',
            ],
        ]);
    }
}
