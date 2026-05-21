<?php

namespace App\Models;

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
        return $this->hasMany(EmployeeSection::class, 'parent_id');
    }
    // public function items()
    // {
    //     return $this->hasMany(EmployeeItem::class);
    // }
}
