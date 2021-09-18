<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourceItem extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function trainers(){
        return $this -> hasMany('App\Models\Trainer');
    }
}
