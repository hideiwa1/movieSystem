<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieCategory;
use Log;

class MovieController extends Controller
{
    public function index(Request $request)
    {

        return view('index');
    }

    public function edit(Request $request)
    {
        $user_id = '';
        if(Auth::guard('admins')->check()){
            $user_id = Auth::guard('admins')->id();
        }

        $id = $request -> id ?? '';
        if(empty($id)){
            $movie_data = '';
        }else{
            $movie_data = Movie::find($id);
        }

        $category_data = MovieCategory::get();
        
        return view('movieEdit', ['movie_data' => $movie_data, 'category_data' => $category_data, 'user_id' => $user_id]);
    }

    public function update(Request $request)
    {
        \Log::debug('$request: '.$request);

        $id = $request -> id;
        if(empty($id)){
            $movie = new Movie;
        }else{
            $movie = Movie::find($id);
        }
        $form = $request -> all();
        unset($form['_token']);
        unset($form['id']);

        if($request -> file('movie')){
			//$this -> validate($request, $rules);
			$path = Storage::disk('local') -> putFile('files', $request -> file('movie'), 'public');
			$form['filepath'] = Storage::disk('public') -> url($path);
		}
        \Log::debug('$form: '.print_r($form, true));
        $movie -> fill($form);

        $movie -> save();
        $id = $movie -> id;

        return redirect(route('movie.detail', ['id' => $id]));
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

