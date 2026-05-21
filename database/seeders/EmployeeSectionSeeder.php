<?php

namespace Database\Seeders;

use App\Models\Website;
use App\Models\EmployeeSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sections = [
            ['name' => 'ผู้บริหาร', 'sort_order' => 1],
            ['name' => 'อาจารย์', 'sort_order' => 2],
            ['name' => 'เจ้าหน้าที่', 'sort_order' => 3],
        ];

        foreach (Website::all() as $website) {
            foreach ($sections as $section) {
                EmployeeSection::create([
                    'website_id' => $website->id,
                    'title_th' => $section['name'],
                    'slug' => Str::slug($section['name']),
                    'sort_order' => $section['sort_order'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
