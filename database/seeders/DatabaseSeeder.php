<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CoQuanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ThangSeeder::class);
        $this->call(QuySeeder::class);
        $this->call(NamSeeder::class);
        $this->call(LoaiDanhGiaSeeder::class);
    }
}
