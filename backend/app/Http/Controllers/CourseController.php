<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\MovieCategory;
use Log;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        return view('index');
    }

    public function show(Request $request)
    {
        $id = $request -> id;
        $movie_data = Movie::find($id);
        if($movie_data){
            $movie_data -> filepath = Storage::disk('s3') -> url($movie_data -> filepath);
        }else{
            return redirect(route('movie.edit'));
        }

        return view('movieDetail', ['movie_data' => $movie_data]);
    }
    public function edit(Request $request)
    {
        $user_id = '';
        if(Auth::guard('admins')->check()){
            $user = Auth::guard('admins')->user();
        }

        $id = $request -> id ?? '';
        if(empty($id)){
            $course_data = '';
        }else{
            $course_data = Course::find($id);
            if($course_data){

            }else{
                return redirect(route('movie.edit'));
            }
        }
        \Log::debug('$course_data: '.print_r($course_data, true));
        $category_data = MovieCategory::get();
        
        return view('courseEdit', ['course_data' => $course_data, 'category_data' => $category_data, 'user' => $user]);
    }

    public function update(Request $request)
    {
        \Log::debug('$request: '.$request -> name);

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
			$path = Storage::disk('s3') -> putFile('movie', $request -> file('movie'), 'public');
			$form['filepath'] = $path;
		}
        \Log::debug('$form: '.print_r($form, true));
        $movie -> fill($form);

        $movie -> save();
        $id = $movie -> id;

        return redirect(route('movie.detail', ['id' => $id]));
    }

    public function List(Request $request)
    {
        $movie_data = Movie::get();
        
        return view('movieList', ['movie_data' => $movie_data]);
    }

    public function Search(Request $request)
    {
        \Log::debug('$request: '.$request -> club);

        $sql = [];
        
        $keyword = $request -> keyword;
        $category_id = $request -> category;
        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $status_flg = '';
        }elseif($request -> status_on == 'true'){
            $open_flg = 1;
        }elseif($request -> status_off == 'true'){
            $open_flg = 2;
        }else{
            $open_flg = '';
        }

        $keyword && $sql[] = ['name', 'LIKE', '%'.$keyword.'%'];
        $category_id && $sql[] = ['category_id', '=', $category_id];
        $open_flg && $sql[] = ['open_flg', '=', $open_flg];
        $movie_data = Movie::where($sql)
            -> paginate(10);
        

        return $movie_data;
    }


    public function Delete(Request $request)
    {
        $id = $request -> id;

        $movie_data = Movie::find($id);

        Storage::disk('s3') -> delete($movie_data -> filepath);

        $movie_data -> delete();

        return redirect() -> back();
    }
}

