<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Sex;
use App\Models\Trainer;
use App\Models\MailList;
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

            $mailList = new MailList;
            $send_data['email'] = $val;
            if(Auth::guard('admins')->check()){
                $send_data['admin_id'] = Auth::guard('admins')->id();
            }elseif(Auth::guard('trainers')->check()){
                $send_data['trainer_id'] = Auth::guard('trainers')->id();
            }

            $mailList -> fill($send_data);
            $mailList -> save();
            $send_data = [];
        }
        

        return redirect(route('mail.show',[]));
    }

    public function List(Request $request)
    {
        
        return view('mailTotal');
    }

    public function Search(Request $request)
    {
        \Log::debug('$request: '.$request -> club);

        $sql = [];
        
        $keyword = $request -> keyword;
        
        $keyword && $sql[] = ['trainers.name', 'LIKE', '%'.$keyword.'%'];
        $trainer_data = Trainer::where($sql)
            -> paginate(10);

        $mailList_data = [];
        
        foreach($trainer_data as $key => $val){
            $mailList_data[$val['name']] = MailList::groupBy('send_month')
            -> select(DB::raw('date_format(created_at, "%Y-%c") as send_month'), DB::raw('count(*) as total'))
            -> where('trainer_id', '=', $val['id'])
            -> orderByDesc('send_month')
            -> get();
            \Log::debug($mailList_data);
            $mailList_total[$val['name']] = MailList::where('trainer_id', '=', $val['id'])->count();
        }


        $data['trainer_data'] = $trainer_data;
        $data['mailList_total'] = $mailList_total;
        $data['mailList_data'] = $mailList_data;
        return $data;
    }

    public function csv(Request $request)
    {
        \Log::debug('$request: '.$request -> club);

        $sql = [];
        
        $keyword = $request -> keyword;
        
        $keyword && $sql[] = ['trainers.name', 'LIKE', '%'.$keyword.'%'];
        $trainer_data = Trainer::where($sql)
            -> get();

        $mailList_data = [];
        
        foreach($trainer_data as $key => $val){
            $mailList_data[$val['name']] = MailList::groupBy('send_month')
            -> select(DB::raw('date_format(created_at, "%Y-%c") as send_month'), DB::raw('count(*) as total'))
            -> where('trainer_id', '=', $val['id'])
            -> orderByDesc('send_month')
            -> get();
            \Log::debug($mailList_data);
            $mailList_total[$val['name']] = MailList::where('trainer_id', '=', $val['id'])->count();
        }


        $data['trainer_data'] = $trainer_data;
        $data['mailList_total'] = $mailList_total;
        $data['mailList_data'] = $mailList_data;
        return $data;
    }


    public function detail(Request $request)
    {
        $id = $request -> id;

        $trainer_data = Trainer::find($id);
        
        $mailList_data = MailList::groupBy('send_month')
        -> select(DB::raw('date_format(created_at, "%Y-%c") as send_month'), DB::raw('count(*) as total'))
        -> where('trainer_id', '=', $id)
        -> orderByDesc('send_month')
        -> get();
        
        return view('mailTotalDetail', ['mailList_data' => $mailList_data, 'trainer_data' => $trainer_data]);
    }

    public function detailCsv(Request $request)
    {
        $sql = [];
        \Log::debug($request);
        $trainer_id = $request -> trainer_id;

        $mailList_data = '';

        $mailList_data = MailList::groupBy('send_month')
        -> select(DB::raw('date_format(created_at, "%Y-%c") as send_month'), DB::raw('count(*) as total'))
        -> where('trainer_id', '=', $trainer_id)
        -> orderByDesc('send_month')
        -> get();
        \Log::debug($mailList_data);

        return $mailList_data;
    }
}