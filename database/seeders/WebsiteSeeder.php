<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;
use App\Models\Department;

class WebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $baseDomain = 'https://www.aru.ac.th';

        // เอาเฉพาะ departments ที่มี code
        $departments = Department::whereNotNull('code')->get();

        foreach ($departments as $dept) {

            // 🔹 skip root (aru ใช้ path = /)
            if ($dept->code === 'aru') {
                Website::create([
                    'department_id' => $dept->id,
                    'name' => $dept->name,
                    'slug' => $dept->code,
                    'domain' => $baseDomain,
                    'path' => '/',
                    'is_active' => true,
                    'sort_order' => $dept->sort_order ?? 0,
                ]);
                continue;
            }

            // 🔹 default pattern: /{code}
            Website::create([
                'department_id' => $dept->id,
                'name' => $dept->name,
                'slug' => $dept->code,
                'domain' => $baseDomain,
                'path' => '/' . $dept->code,
                'is_active' => true,
                'sort_order' => $dept->sort_order ?? 0,
            ]);
        }
    }
}