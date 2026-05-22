<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeItem;

class EmployeeItemController extends Controller
{
    public function index()
    {
        return EmployeeItem::with(['employee', 'section'])
            ->orderBy('sort_order')
            ->get();
    }
}
