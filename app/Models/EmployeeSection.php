<?php

namespace App\Models;
use App\Models\EmployeeItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSection extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'website_id',
        'parent_id',
        'title_th',
        'slug',
        'section_type',
        'sort_order',
        'is_active'
    ];

    protected $casts = ['is_active' => 'boolean',];
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
    
    public function parent()
    {
        return $this->belongsTo(EmployeeSection::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(EmployeeSection::class, 'parent_id')->orderBy('sort_order');
    }

    public function items()
    {
        return $this->hasMany(EmployeeItem::class)->orderBy('sort_order');
    }

    public function employeeItems()
    {
        return $this->hasMany(EmployeeItem::class, 'employee_section_id');
    }
}
