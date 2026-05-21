<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSection extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'website_id',
        'title_th',
        'slug',
        'sort_order',
        'is_active'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    // public function items()
    // {
    //     return $this->hasMany(EmployeeItem::class);
    // }
}
