<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenses')->insert([
            [
                'user_id' => 1, // Admin User
                'category_id' => 1, // Rent
                'amount' => 1000,
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Normal User
                'category_id' => 2, // Utilities
                'amount' => 150,
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Default User
                'category_id' => 3, // Groceries
                'amount' => 200,
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Admin User
                'category_id' => 4, // Entertainment
                'amount' => 50,
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
