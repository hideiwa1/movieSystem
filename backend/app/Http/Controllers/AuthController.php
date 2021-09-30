<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Club;
use Log;

class AuthController extends Controller
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
        
    }

    public function Search(Request $request)
    {
        $user = [];
        if(Auth::guard('admins')->check()){
            $user['admin'] = Auth::guard('admins')->user();
        }elseif(Auth::guard('trainers')->check()){
            $user['trainer'] = Auth::guard('trainers')->user();
        }else{
            $user = [];
        }

        return $user;
    }
}
