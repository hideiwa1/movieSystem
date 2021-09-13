<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Log;

class StudentClassController extends Controller
{
    public function show(Request $request)
    {

    }

    public function edit(Request $request)
    {
 
    }

    public function update(Request $request)
    {
 
    }

    public function List(Request $request)
    {
        $class_data = StudentClass::get();
        return $class_data;
    }

    public function Search(Request $request)
    {
        
    }
}
