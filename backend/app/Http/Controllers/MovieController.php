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
            $user_id = Auth::guard('admins')->id();
        }

        $id = $request -> id ?? '';
        if(empty($id)){
            $movie_data = '';
        }else{
            $movie_data = Movie::find($id);
            if($movie_data){
                $movie_data -> filepath = Storage::disk('s3') -> url($movie_data -> filepath);
            }else{
                return redirect(route('movie.edit'));
            }
        }
        \Log::debug('$movie_data: '.print_r($movie_data, true));
        $category_data = MovieCategory::get();
        
        return view('movieEdit', ['movie_data' => $movie_data, 'category_data' => $category_data, 'user_id' => $user_id]);
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

        foreach($movie_data as $key => $val){
            if($val -> filepath){
                $val -> filepath = Storage::disk('s3') -> url($val -> filepath);
            }
        }
        
        return view('movieList', ['movie_data' => $movie_data]);
    }

    public function Search(Request $request)
    {
        \Log::debug($request);

        $sql = [];
        
        $keyword = $request -> keyword;
        $category_id = $request -> category_id;
        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $open_flg = '';
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

        \Log::debug($sql);

        $movie_data = Movie::where($sql)
            -> paginate(10);
        foreach($movie_data as $key => $val){
            if($val -> filepath){
                $val -> filepath = Storage::disk('s3') -> url($val -> filepath);
            }
        }
        
        $movie_all_data = Movie::where($sql)
            -> get();
        foreach($movie_all_data as $key => $val){
            if($val -> filepath){
                $val -> filepath = Storage::disk('s3') -> url($val -> filepath);
            }
        }

        $data = [];
        $data['movie_data'] = $movie_data;
        $data['movie_all'] = $movie_all_data;

        return $data;
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

