<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Sex;
use App\Models\Club;
use Hash;
use Log;

class AdminController extends Controller
{
    public function show(Request $request)
    {
        
    }

    public function edit(Request $request)
    {
        $id = $request -> id ?? '';
        if(empty($id)){
            return redirect(route('admin.list'));
        }else{
            $admin_data = Admin::find($id);
        }

        return view('adminEdit', ['admin_data' => $admin_data]);
    }

    public function update(Request $request)
    {
        $id = $request -> id;
        if(empty($id)){
            return redirect(route('admin.list'));
        }else{
            $admin_data = Admin::find($id);
        }

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$admin_data->id,
        ];
        /*バリデーション*/
        $request -> validate($rules);

        $form = $request -> all();
        unset($form['_token']);

        if($request -> current_password || $request -> password){
            if(!(Hash::check($request -> current_password, $admin_data -> password))){
                return redirect() -> back() -> with('message','パスワードが間違えています');
            }
            if(strcmp($request -> current_password, $request -> password) == 0){
                return redirect() -> back() -> with('message','パスワードが変更されていません。現在のパスワードと違うパスワードを入力してください');
            }
            $validated_data = $request -> validate([
                'password' => 'string|min:4|confirmed',
            ]);
            $form['password'] = bcrypt($request -> password);
        }

        $admin_data -> fill($form);

        $admin_data -> save();

        return back();
    }

    public function list(Request $request)
    {
        $admin_data = Admin::get();
        
        return view('adminList', ['admin_data' => $admin_data]);
    }

    public function Search(Request $request)
    {
        
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

    public function Delete(Request $request)
    {
        $id = $request -> id;

        $admin_data = Admin::find($id);

        $admin_data -> delete();

        return redirect() -> back();
    }
}
