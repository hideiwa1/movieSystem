<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'sex_id',
        'birthday',
        'address',
        'tel',
        'trainer_id',
        'class_id',
        'comment',
        'status_flg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function  trainer(){
        return $this -> belongsTo('App\Models\Trainer');
    }

    public function sex(){
        return $this -> belongsTo('App\Models\Sex');
    }
}
