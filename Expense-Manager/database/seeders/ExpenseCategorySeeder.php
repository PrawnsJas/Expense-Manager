<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expense_categories')->insert([
            [
                'name' => 'Rent',
                'description' => 'Monthly rent for the apartment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Utilities',
                'description' => 'Electricity, water, and other utilities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Groceries',
                'description' => 'Food and grocery shopping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Movies, games, and other leisure activities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
