<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Movie;
use App\Models\CourseItem;
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
        $course_data = Course::find($id);
        if($course_data){
            $course_items = $course_data -> courseItems;
            foreach($course_items as $key => $val){
                $val -> movie -> filepath = Storage::disk('s3') -> url($val -> movie -> filepath);
            }
        }else{
            return redirect(route('course.edit'));
        }

        return view('courseDetail', ['course_data' => $course_data, 'course_items' => $course_items]);
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
                return redirect(route('course.edit'));
            }
        }
        \Log::debug('$course_data: '.print_r($course_data, true));
        $category_data = MovieCategory::get();
        
        return view('courseEdit', ['course_data' => $course_data, 'category_data' => $category_data, 'user' => $user]);
    }

    public function editData(Request $request)
    {
        $user_id = [];
        if(Auth::guard('admins')->check()){
            $user_id['admin'] = Auth::guard('admins')->user();
        }elseif(Auth::guard('trainers')->check()){
            $user_id['trainer'] = Auth::guard('trainers')->user();
        }else{
            $user_id = [];
        }
        \Log::debug('$user_id: '.print_r($user_id, true));

        $id = $request -> id ?? '';

        \Log::debug('$id: '.print_r($id, true));
        if(empty($id)){
            $course_data = '';
        }else{
            $course_data = Course::find($id);
        }

        if(!empty($course_data)){
            if(!empty($course_data['admin_id'])){
                $course_data['auter_name'] = Auth::guard('admins')->user()->name;
            }elseif(!empty($course_data['trainer_id'])){
                $course_data['auter_name'] = Auth::guard('trainers')->user()->name;
            }else{
                $course_data['auter_name'] = '';
            }
        }

        \Log::debug('$course_data: '.print_r($course_data, true));
        $movie_data = [];
        if(empty($course_data)){
            $item_data = '';
        }else{
            $item_data = CourseItem::where('course_id', '=', $id) -> get();

            foreach($item_data as $key => $val){
                $data = Movie::find($val -> movie_id);
                if($data -> filepath){
                    $data -> filepath = Storage::disk('s3') -> url($data -> filepath);
                }
                $movie_data[] = $data;
            }
        }
        
        $data = [];
        $data['user_id'] = $user_id;
        $data['course_data'] = $course_data;
        $data['item_data'] = $movie_data;

        return $data;
    }

    public function update(Request $request)
    {
        \Log::debug('update $request: '.print_r($request -> name, true));

        $id = $request -> id;
        if(empty($id)){
            $movie = new Course;
        }else{
            $movie = Course::find($id);
        }
        $form = $request -> all();
        unset($form['_token']);
        unset($form['id']);
        
        $form['start_at'] = $form['start_at'] ?? date("Y-m-d");
        $form['end_at'] = $form['end_at'] ?? date("Y-m-d", strtotime('2100-12-31'));

        \Log::debug('$form: '.print_r($form, true));
        $movie -> fill($form);
        if(!empty($id)){

        }

        $movie -> save();
        $id = $movie -> id;

        if(!empty($form['movie_id'])){
            $item_data = CourseItem::where('course_id', '=', $id) -> get();


            if($item_data -> isEmpty()){
                for($i = 0; $i < count($form['movie_id']); $i++){
                    $form_item['course_id'] = $id;
                    $form_item['order'] = ($i + 1);
                    $form_item['movie_id'] = $form['movie_id'][$i];

                    $new_item_data = new CourseItem;
                    $new_item_data -> fill($form_item) -> save();
                }
            }else if(count($item_data) >= count($form['movie_id'])){
                for($i = 0; $i < count($item_data); $i++){
                    if(isset($form['movie_id'][$i])){
                        $form_item['course_id'] = $id;
                        $form_item['order'] = ($i + 1);
                        $form_item['movie_id'] = $form['movie_id'][$i];

                        $item_data[$i] -> fill($form_item) -> save();
                    }else{
                        $item_data[$i] -> delete();
                    }
                }
            }else{
                for($i = 0; $i < count($form['movie_id']); $i++){
                    $form_item['course_id'] = $id;
                    $form_item['order'] = ($i + 1);
                    $form_item['movie_id'] = $form['movie_id'][$i];

                    if(isset($item_data[$i])){
                        $item_data[$i] -> fill($form_item) -> save();
                    }else{
                        $new_item_data = new CourseItem;
                        $new_item_data -> fill($form_item) -> save();
                    }
                }
            }
        }

        return redirect(route('course.detail', ['id' => $id]));
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
        $open_flg && $sql[] = ['open_flg', '=', $open_flg];
        $course_data = Course::where($sql)
            -> paginate(10);

        return $course_data;
    }


    public function Delete(Request $request)
    {
        $id = $request -> id;

        $course_data = Course::find($id);

        $course_data -> delete();

        CourseItem::where('course_id', $id) -> delete();

        return redirect() -> back();
    }
}

