<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\TrainerCategory;
use App\Models\Sex;
use App\Models\Club;
use Log;

class TrainerController extends Controller
{
    public function show(Request $request)
    {
        $id = $request -> id;
        $trainer_data = Trainer::find($id);
        return view('trainerDetail', ['trainer_data' => $trainer_data]);
    }

    public function edit(Request $request)
    {
        $id = $request -> id ?? '';
        if(empty($id)){
            $trainer_data = '';
        }else{
            $trainer_data = Trainer::find($id);
        }

        $category_data = TrainerCategory::get();
        $sex_data = Sex::get();
        $club_data = Club::get();

        return view('trainerEdit', ['trainer_data' => $trainer_data, 'category_data' => $category_data, 'sex_data' => $sex_data, 'club_data' => $club_data]);
    }

    public function update(Request $request)
    {
        $id = $request -> id;
        if(empty($id)){
            $trainer = new Trainer;
        }else{
            $trainer = Trainer::find($id);
        }
        $form = $request -> all();
        unset($form['_token']);
        unset($form['id']);

        $trainer -> fill($form);

        $trainer -> save();
        $id = $trainer -> id;

        return redirect(route('trainer.detail', ['id' => $id]));
    }

    public function List(Request $request)
    {
        if(isset($request -> id)){
            $trainer_data = Trainer::where('club_id', $request -> id) -> get();
        }else{
            $trainer_data = Trainer::get();
        }

        $club_data = Club::get();
        return view('trainerList', ['trainer_data' => $trainer_data, 'club_data' => $club_data]);
    }

    public function Search(Request $request)
    {
        \Log::debug('$request: '.$request -> club);

        $sql = [];
        
        $keyword = $request -> keyword;
        $club_id = $request -> club;
        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $status_flg = '';
        }elseif($request -> status_on == 'true'){
            $status_flg = 1;
        }elseif($request -> status_off == 'true'){
            $status_flg = 2;
        }else{
            $status_flg = '';
        }

        $keyword && $sql[] = ['trainers.name', 'LIKE', '%'.$keyword.'%'];
        $club_id && $sql[] = ['trainers.club_id', '=', $club_id];
        $status_flg && $sql[] = ['trainers.status_flg', '=', $status_flg];
            $trainer_data = DB::table('trainers') 
            -> select('trainers.*', 'clubs.name as club_name')
            -> where($sql)
            -> leftJoin('clubs', 'trainers.club_id', '=', 'clubs.id') 
            -> paginate(10);
        

        return $trainer_data;
    }

    public function csv(Request $request)
    {
        $sql = [];
        
        $keyword = $request -> keyword;
        $club_id = $request -> club;
        if($request -> status_on == 'true' && $request -> status_off == 'true'){
            $status_flg = '';
        }elseif($request -> status_on == 'true'){
            $status_flg = 1;
        }elseif($request -> status_off == 'true'){
            $status_flg = 2;
        }else{
            $status_flg = '';
        }

        $keyword && $sql[] = ['trainers.name', 'LIKE', '%'.$keyword.'%'];
        $club_id && $sql[] = ['trainers.club_id', '=', $club_id];
        $status_flg && $sql[] = ['trainers.status_flg', '=', $status_flg];
            $trainer_data = DB::table('trainers') 
            -> select('trainers.*', 'clubs.name as club_name')
            -> where($sql)
            -> leftJoin('clubs', 'trainers.club_id', '=', 'clubs.id') 
            -> get();

        return $trainer_data;
    }
}
