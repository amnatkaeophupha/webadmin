<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function index()
    {
        return Website::with('department')
            ->orderBy('sort_order')
            ->get();
    }
}