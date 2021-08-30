<?php

namespace App\Http\Controllers;

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
        $trainer_data = Trainer::find($id);

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

        return redirect(route('trainer.edit', ['id' => $id]));
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
}
