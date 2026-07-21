<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmployeeSection;
use App\Models\EmployeeItem;

class EmployeeItemSeeder extends Seeder
{
    public function run(): void
    {
        $sections = EmployeeSection::all();
        $employees = Employee::where('is_active', true)->get();

        if ($sections->isEmpty() || $employees->isEmpty()) {
            $this->command->warn('No sections or employees found.');
            return;
        }

        foreach ($sections as $section) {

            // จำนวนคนต่อ section (ปรับได้)
            $randomEmployees = $employees->random(
                min(rand(3, 6), $employees->count())
            );

            $sort = 1;

            foreach ($randomEmployees as $employee) {

                EmployeeItem::firstOrCreate(
                    [
                        'employee_section_id' => $section->id,
                        'employee_id' => $employee->id,
                    ],
                    [
                        //'display_position_name' => $employee->position, // ใช้ default จาก employee
                        'display_position_name' => $employee->position_name,
                        'managed_departments' => null,
                        'sort_order' => $sort++,
                        'is_active' => true,
                    ]
                );
            }
        }

        $this->command->info('EmployeeItems seeded successfully.');
    }
}