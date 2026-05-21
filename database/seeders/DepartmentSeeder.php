<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->truncate();

        $aruId = DB::table('departments')->insertGetId([
            'parent_id' => null,
            'name' => 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา',
            'code' => 'aru',
            'slug' => 'aru',
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $opsId = DB::table('departments')->insertGetId([
            'parent_id' => $aruId,
            'name' => 'สำนักงานอธิการบดี',
            'code' => 'ops',
            'slug' => 'ops',
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $departments = [
            [
                'parent_id' => $opsId,
                'name' => 'กองกลาง',
                'code' => 'central',
                'slug' => 'central',
                'sort_order' => 1,
            ],
            [
                'parent_id' => $opsId,
                'name' => 'กองบริการการศึกษา',
                'code' => 'regis',
                'slug' => 'regis',
                'sort_order' => 2,
            ],
            [
                'parent_id' => $opsId,
                'name' => 'กองนโยบายและแผน',
                'code' => 'plan',
                'slug' => 'plan',
                'sort_order' => 3,
            ],
            [
                'parent_id' => $opsId,
                'name' => 'กองพัฒนานักศึกษา',
                'code' => 'dsd',
                'slug' => 'dsd',
                'sort_order' => 4,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'คณะครุศาสตร์',
                'code' => 'edu',
                'slug' => 'edu',
                'sort_order' => 2,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
                'code' => 'human',
                'slug' => 'human',
                'sort_order' => 3,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
                'code' => 'sci',
                'slug' => 'sci',
                'sort_order' => 4,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'คณะวิทยาการจัดการ',
                'code' => 'ms',
                'slug' => 'ms',
                'sort_order' => 5,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'บัณฑิตวิทยาลัย',
                'code' => 'grad',
                'slug' => 'grad',
                'sort_order' => 6,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'โรงเรียนสาธิตมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา',
                'code' => 'stay',
                'slug' => 'stay',
                'sort_order' => 7,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                'code' => 'arit',
                'slug' => 'arit',
                'sort_order' => 8,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'สถาบันวิจัยและพัฒนา',
                'code' => 'rdi',
                'slug' => 'rdi',
                'sort_order' => 9,
            ],
            [
                'parent_id' => $aruId,
                'name' => 'สถาบันอยุธยาศึกษา',
                'code' => 'asi',
                'slug' => 'asi',
                'sort_order' => 10,
            ],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                ...$department,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}