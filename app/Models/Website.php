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

    protected $casts = ['is_active' => 'boolean',];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employeeSections()
    {
        return $this->hasMany(EmployeeSection::class);
    }
}
