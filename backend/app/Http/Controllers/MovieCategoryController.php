<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MovieCategory;
use Log;

class MovieCategoryController extends Controller
{
    public function index(Request $request)
    {

        return view('index');
    }

    public function edit(Request $request)
    {
 
    }

    public function update(Request $request)
    {
 
    }

    public function List(Request $request)
    {
        $category_data = MovieCategory::get();
        return $category_data;
    }

    public function Search(Request $request)
    {
        
    }
}

