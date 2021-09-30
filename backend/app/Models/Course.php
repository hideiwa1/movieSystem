<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'admin_id',
        'trainer_id',
        'comment',
        'open_flg',
        'start_at',
        'end_at'
    ];

    public function trainers(){
        return $this -> hasMany('App\Models\Trainer');
    }

    public function courseItems(){
        return $this -> hasMany('App\Models\CourseItem');
    }
}
