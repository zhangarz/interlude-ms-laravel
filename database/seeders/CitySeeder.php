<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name_ar' => 'بغداد', 'name_en' => 'Baghdad', 'name_ku' => 'بغداد'],
            ['name_ar' => 'البصرة', 'name_en' => 'Basra', 'name_ku' => 'بصرة'],
            ['name_ar' => 'نينوى', 'name_en' => 'Nineveh', 'name_ku' => 'مناطق نينوى'],
            ['name_ar' => 'أربيل', 'name_en' => 'Erbil', 'name_ku' => 'هەولیر'],
            ['name_ar' => 'السليمانية', 'name_en' => 'Sulaimaniyah', 'name_ku' => 'سلێمانی'],
            ['name_ar' => 'ديالى', 'name_en' => 'Diyala', 'name_ku' => 'دیالی'],
            ['name_ar' => 'كربلاء', 'name_en' => 'Karbala', 'name_ku' => 'کربلا'],
            ['name_ar' => 'النجف', 'name_en' => 'Najaf', 'name_ku' => 'نجف'],
            ['name_ar' => 'الموصل', 'name_en' => 'Mosul', 'name_ku' => 'موصل'],
            ['name_ar' => 'الأنبار', 'name_en' => 'Anbar', 'name_ku' => 'عەنبەر'],
            // Add more cities as needed
        ]);
    }
}
