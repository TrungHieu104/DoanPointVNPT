<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($quy = 1 ; $quy <= 4 ; $quy++) {
            DB::table('quy')->insert([
                [
                    'quy' => $quy,
                    'created_at' => Now(), 
                    'updated_at' => Now(),
                ],
            ]);
        }
    }
}
