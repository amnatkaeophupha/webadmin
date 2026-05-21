<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'name',
        'code',
        'slug',
        'is_active',
        'sort_order',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Department::class, 'parent_id')
            ->orderBy('sort_order');
    }
}
