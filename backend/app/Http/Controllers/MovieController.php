<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use Log;

class MovieController extends Controller
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
        $club_data = Club::get();
        return $club_data;
    }

    public function Search(Request $request)
    {
        
    }
}

