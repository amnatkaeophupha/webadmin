<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;

class WebsiteEmployeeController extends Controller
{
    public function show(int $id)
    {
        $website = Website::with([
            'employeeSections' => function ($q) {
                $q->whereNull('parent_id')
                ->with([
                    'children',
                    'employeeItems.employee'
                ])
                ->orderBy('sort_order');
            }
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $website
        ]);
    }
}
