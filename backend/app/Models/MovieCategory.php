<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function movies(){
        return $this -> hasMany('App\Models\Movie');
    }
}
