<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            'durasi_menit' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
