<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeSection;
use App\Models\Website;
use Illuminate\Support\Str;

class EmployeeSectionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Website::all() as $website) {

            // 🔹 root: สำนักงานอธิการบดี
            $office = EmployeeSection::create([
                'website_id' => $website->id,
                'parent_id' => null,
                'title_th' => 'สำนักงานอธิการบดี',
                'slug' => 'office-of-president',
                'section_type' => 'organization',
                'sort_order' => 1,
                'is_active' => true,
            ]);

            // =========================
            // กองกลาง
            // =========================
            $central = EmployeeSection::create([
                'website_id' => $website->id,
                'parent_id' => $office->id,
                'title_th' => 'กองกลาง',
                'slug' => 'central',
                'section_type' => 'division',
                'sort_order' => 1,
                'is_active' => true,
            ]);

            $this->createChildren($website->id, $central->id, [
                'งานบริหารทั่วไป',
                'งานการเงินและบัญชี',
                'งานกิจการสภามหาวิทยาลัย',
                'งานทรัพยากรบุคคล',
                'งานนิติการ',
                'งานบริหารอาคารและจัดหารายได้',
                'งานพัสดุ',
                'งานอาคารสถานที่และภูมิทัศน์',
                'ศูนย์พัฒนาการเรียนรู้และสื่อสารองค์กร',
            ]);

            // =========================
            // กองนโยบายและแผน
            // =========================
            $plan = EmployeeSection::create([
                'website_id' => $website->id,
                'parent_id' => $office->id,
                'title_th' => 'กองนโยบายและแผน',
                'slug' => 'plan',
                'section_type' => 'division',
                'sort_order' => 2,
                'is_active' => true,
            ]);

            $this->createChildren($website->id, $plan->id, [
                'งานบริหารยุทธศาสตร์',
                'สำนักงานมาตรฐานและประเมินผล',
            ]);

            // =========================
            // กองบริการการศึกษา
            // =========================
            $regis = EmployeeSection::create([
                'website_id' => $website->id,
                'parent_id' => $office->id,
                'title_th' => 'กองบริการการศึกษา',
                'slug' => 'regis',
                'section_type' => 'division',
                'sort_order' => 3,
                'is_active' => true,
            ]);

            $this->createChildren($website->id, $regis->id, [
                'งานส่งเสริมวิชาการ',
                'งานบริการการศึกษา',
            ]);

            // =========================
            // กองพัฒนานักศึกษา
            // =========================
            $dsd = EmployeeSection::create([
                'website_id' => $website->id,
                'parent_id' => $office->id,
                'title_th' => 'กองพัฒนานักศึกษา',
                'slug' => 'dsd',
                'section_type' => 'division',
                'sort_order' => 4,
                'is_active' => true,
            ]);

            $this->createChildren($website->id, $dsd->id, [
                'งานบริการ สวัสดิการ และบริการนักศึกษา',
                'งานกิจกรรมและพัฒนานักศึกษา',
            ]);
        }
    }

    private function createChildren($websiteId, $parentId, $names)
    {
        foreach ($names as $index => $name) {
            EmployeeSection::create([
                'website_id' => $websiteId,
                'parent_id' => $parentId,
                'title_th' => $name,
                'slug' => Str::slug($name),
                'section_type' => 'section',
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}