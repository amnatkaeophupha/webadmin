<?php

namespace App\Models;
use App\Models\EmployeeSection;
use Illuminate\Database\Eloquent\Model;

class EmployeeItem extends Model
{

    protected $fillable = [
        'employee_section_id',
        'employee_id',
        'display_position_name',
        'managed_departments',
        'sort_order',
        'is_active',
    ];

    protected $casts = ['managed_departments' => 'array','is_active' => 'boolean',];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function section()
    {
        return $this->belongsTo(EmployeeSection::class, 'employee_section_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employeeSection()
    {
        return $this->belongsTo(EmployeeSection::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors (ช่วยให้ใช้งานง่ายขึ้น)
    |--------------------------------------------------------------------------
    */

    public function getDisplayPositionAttribute()
    {
        return $this->display_position_name
            ?? $this->employee?->position_name;
    }
}