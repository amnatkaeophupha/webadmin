<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSection;
use Illuminate\Http\Request;

class EmployeeSectionController extends Controller
{

    // public function index()
    // {
    //     return EmployeeSection::with(['website', 'children'])
    //         ->whereNull('parent_id')
    //         ->orderBy('sort_order')
    //         ->get();
    // }    
    
    public function index(Request $request)
    {
        $websiteId = $request->get('website_id');

        $sections = EmployeeSection::with('children.children') // รองรับ 3 ชั้น
            ->where('website_id', $websiteId)
            ->whereNull('parent_id')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $sections
        ]);
    }


}
