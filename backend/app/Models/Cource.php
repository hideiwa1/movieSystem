<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;

    public function trainers(){
        return $this -> hasMany('App\Models\Trainer');
    }
}
