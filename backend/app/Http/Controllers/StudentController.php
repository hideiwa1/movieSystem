<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Sex;
use App\Models\Trainer;
use Log;

class StudentController extends Controller
{
    public function show(Request $request)
    {
        $id = $request -> id;
        $student_data = Student::find($id);
        $student_data -> class_id = $student_data -> class_id ? unserialize($student_data -> class_id) : '';

        $class_data = StudentClass::get();

        return view('studentDetail', ['student_data' => $student_data, 'class_data' => $class_data]);
    }

    public function edit(Request $request)
    {
        $id = $request -> id ?? '';
        if(empty($id)){
            $student_data = '';
        }else{
            $student_data = Student::find($id);
            $student_data -> class_id = $student_data -> class_id ? unserialize($student_data -> class_id) : '';
        }

        $sex_data = Sex::get();
        $trainer_data = Trainer::get();
        $class_data = StudentClass::get();

        return view('studentEdit', ['student_data' => $student_data, 'sex_data' => $sex_data, 'trainer_data' => $trainer_data, 'class_data' => $class_data]);
    }

    public function update(Request $request)
    {
        $id = $request -> id;
        if(empty($id)){
            $student = new Student;
        }else{
            $student = Student::find($id);
        }
        $form = $request -> all();
        unset($form['_token']);
        unset($form['id']);

        $class_id = serialize($form['class_id']);
        $form['class_id'] = $class_id;

        $student -> fill($form);

        $student -> save();
        $id = $student -> id;

        return redirect(route('student.detail', ['id' => $id]));
    }

    public function List(Request $request)
    {
        $student_data = Student::get();
        
        return view('studentList', ['student_data' => $student_data]);
    }

    public function Search(Request $request)
    {

        $class_data = StudentClass::get();

        $sql = [];
        
        $keyword = $request -> keyword;
        $class_id = $request -> class_id;

        \Log::debug('$request : '.$request -> status_on);
        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $status_flg = '';
        }elseif($request -> status_on == 'true'){
            $status_flg = 1;
        }elseif($request -> status_off == 'true'){
            $status_flg = 2;
        }else{
            $status_flg = '';
        }

        $keyword && $sql[] = ['students.name', 'LIKE', '%'.$keyword.'%'];
        if($class_id){
          
                $sql[] = ['students.class_id', 'LIKE', '%'.serialize($class_id).'%'];
            
        }
        
        $status_flg && $sql[] = ['students.status_flg', '=', $status_flg];
        \Log::debug('$sql : '.print_r($sql, true));
        $student_data = DB::table('students') 
            -> select('students.*', 'trainers.name as trainer_name')
            -> where($sql)
            -> leftJoin('trainers', 'students.trainer_id', '=', 'trainers.id') 
            -> paginate(10);
        
        
        
        foreach($student_data as $key => $val){
            if($val -> class_id){
                $val -> class_id = unserialize($val -> class_id);
                $class_name = [];
                foreach($val -> class_id as $keys => $vals){
                    foreach($class_data as $class_key => $class_val){
                        if($vals == $class_val -> id){
                            $class_name[] = $class_val -> name;
                        }
                    }
                }
                $val -> class_name = $class_name;
            }else{
                $val -> class_name = [];
            }
        }

        $student_all_id = DB::table('students') 
            -> select('id')
            -> where($sql)
            -> get();
        
        $student_all = [];
        foreach($student_all_id as $key => $val){
            $student_all[] = (string)$val -> id;
        }

        $data = [];
        $data['student_data'] = $student_data;
        $data['student_all'] = $student_all;

        return $data;
    }

    public function csv(Request $request)
    {
        $class_data = StudentClass::get();

        $sql = [];
        
        $keyword = $request -> keyword;
        $class_id = $request -> class_id;

        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $status_flg = '';
        }elseif($request -> status_on == 'true'){
            $status_flg = 1;
        }elseif($request -> status_off == 'true'){
            $status_flg = 2;
        }else{
            $status_flg = '';
        }

        $keyword && $sql[] = ['students.name', 'LIKE', '%'.$keyword.'%'];
        if($class_id){
                $sql[] = ['students.class_id', 'LIKE', '%'.serialize($class_id).'%'];
        }
        
        $status_flg && $sql[] = ['students.status_flg', '=', $status_flg];
        $student_data = DB::table('students') 
            -> select('students.*', 'trainers.name as trainer_name')
            -> where($sql)
            -> leftJoin('trainers', 'students.trainer_id', '=', 'trainers.id') 
            -> get();
        
        foreach($student_data as $key => $val){
            if($val -> class_id){
                $val -> class_id = unserialize($val -> class_id);
                $class_name = [];
                foreach($val -> class_id as $keys => $vals){
                    foreach($class_data as $class_key => $class_val){
                        if($vals == $class_val -> id){
                            $class_name[] = $class_val -> name;
                        }
                    }
                }
                $val -> class_name = $class_name;
            }else{
                $val -> class_name = [];
            }
        }

        return $student_data;
    }
}
