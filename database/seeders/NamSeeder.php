<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($years = 2020 ; $years <= 2025 ; $years++) {
            DB::table('nam')->insert([
                [
                    'nam' => $years,
                    'created_at' => Now(), 
                    'updated_at' => Now(),
                ],
            ]);
        }
    }
}
