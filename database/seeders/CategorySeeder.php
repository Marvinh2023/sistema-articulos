<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Electronics',
                'description' => 'Devices, gadgets and digital accessories.',
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ],
            [
                'name' => 'Clothing',
                'description' => 'Men and women apparel, shoes, and accessories.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Furniture',
                'description' => 'Home and office furniture like chairs, tables and beds.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
