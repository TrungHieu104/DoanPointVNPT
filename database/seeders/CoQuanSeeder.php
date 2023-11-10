<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CoQuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('coquan')->insert([
            [
                'ten' => 'Tỉnh Đoàn BR-VT',
                'diaChi'=> 'Bà Rịa',
                'email' => ' brvt@gmail.com',
                'phone' => '0123456789',
                'parent_CQ' => 0,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
            [
                'ten' => 'Thành Đoàn VT',
                'diaChi'=> 'Vũng Tàu',
                'email' => ' vtu@gmail.com',
                'phone' => '0123456789',
                'parent_CQ' => 1,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
            [
                'ten' => 'Đoàn thanh niên Xuyên Mộc',
                'diaChi'=> 'Xuyên Mộc',
                'email' => ' xmu@gmail.com',
                'phone' => '0123456789',
                'parent_CQ' => 1,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
        ]);
    }
}
