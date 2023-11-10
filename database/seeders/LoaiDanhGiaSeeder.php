<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiDanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($year = 1; $year <= 6; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                DB::table('loaidanhgia')->insert([
                    [
                        'id_thang' => $month,
                        'id_nam' => $year,
                        'created_at' => Now(), 
                        'updated_at' => Now(),
                    ],
                ]);
                if($month == 12){
                    for ($quy = 1; $quy <= 4; $quy++) {
                        DB::table('loaidanhgia')->insert([
                            [
                                'id_quy' => $quy,
                                'id_nam' => $year,
                                'created_at' => Now(), 
                                'updated_at' => Now(),
                            ],
                        ]);
                        if($quy == 4){
                            DB::table('loaidanhgia')->insert([
                                [
                                    'id_nam' => $year,
                                    'created_at' => Now(), 
                                    'updated_at' => Now(),
                                ],
                            ]);
                            break;
                        }
                    }
                }
            }
        }
    }
}
