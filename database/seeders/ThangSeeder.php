<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            DB::table('thang')->insert([
                [
                    'thang' => $i,
                    'created_at' => Now(), 
                    'updated_at' => Now(),
                ],
            ]);
        }
    }
}
