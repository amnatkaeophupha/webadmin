<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'slug',
        'domain',
        'path',
        'is_active',
        'sort_order',
    ];

    // 🔗 belongs to department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // 🔗 has many sections (Step 4)
    // public function employeeSections()
    // {
    //     return $this->hasMany(EmployeeSection::class);
    // }
}
