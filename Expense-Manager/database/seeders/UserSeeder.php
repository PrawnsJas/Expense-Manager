<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role_id' => 1, // Administrator
            ],
            [
                'name' => 'Normal User',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
                'role_id' => 2, // User
            ],
        ]);
    }
    
}
