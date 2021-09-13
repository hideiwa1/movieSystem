<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Sex;
use App\Models\Trainer;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Log;

class MailController extends Controller
{
    public function show(Request $request)
    {
        $class_data = StudentClass::get();

        return view('mail', ['class_data' => $class_data]);
    }

    public function select(Request $request)
    {
        $list = explode(',', $request -> list) ?? '';

        if(empty($list)){
            $student_data = '';
        }else{

            foreach($list as $key => $val){
    
                $student_data[] = Student::find($val);
            }
        }

        $sex_data = Sex::get();
        $trainer_data = Trainer::get();
        $class_data = StudentClass::get();

        return view('mail', ['student_data' => $student_data, 'list' => $list, 'sex_data' => $sex_data, 'trainer_data' => $trainer_data, 'class_data' => $class_data]);
    }

    public function send(Request $request)
    {
        $method = $request -> method;
        if($method == 'email'){
            $to[] = $request -> email;
        }elseif($method == 'list'){
            $to = $request -> list;
        }elseif($method == 'class'){
            $class = $request -> class;
            $data = DB::table('students') 
            -> select('email')
            -> where('class_id', 'LIKE', '%'.serialize($class).'%')
            -> get();

            $to = '';
            foreach($data as $key => $val){
                $to[] = $val -> email;
            }
        }else{
            $to = "";
        }
        $subject = $request -> subject ?? '';
        $comment = $request -> comment ?? '';
        $url = $request -> url ?? '';

        foreach($to as $key => $val){
            $name = DB::table('students') 
            -> select('name')
            -> where('email', '=', $val)
            -> first();
            Mail::to($val)->send(new Contact($subject, $name->name, $comment, $url));
        }
        

        return redirect(route('mail.show',[]));
    }

    public function List(Request $request)
    {
        $student_data = Student::get();
        
        return view('studentList', ['student_data' => $student_data]);
    }

}