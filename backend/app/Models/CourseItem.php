<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseItem extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'movie_id',
        'order'
    ];

    public function course(){
        return $this -> belongsTo('App\Models\Course');
    }

    public function movie(){
        return $this -> belongsTo('App\Models\Movie');
    }
}
