<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSection;
class EmployeeSectionController extends Controller
{
    public function index()
    {
        return EmployeeSection::with(['website', 'children'])
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
    }
}
