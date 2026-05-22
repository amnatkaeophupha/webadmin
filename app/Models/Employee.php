<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'home_department_id',
        'type',
        'prefix_name_th',
        'first_name_th',
        'last_name_th',
        'position_name',
        'internal_phone',
        'mobile_phone',
        'line_id',
        'email',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function homeDepartment()
    {
        return $this->belongsTo(Department::class, 'home_department_id');
    }

    public function employeeItems()
    {
        return $this->hasMany(EmployeeItem::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors (แนะนำ)
    |--------------------------------------------------------------------------
    */

    public function getFullNameThAttribute()
    {
        return trim("{$this->prefix_name_th}{$this->first_name_th} {$this->last_name_th}");
    }
}