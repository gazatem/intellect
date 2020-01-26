<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

class ToolController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.tools.index');
    }
}