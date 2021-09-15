<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'filepath',
        'comment',
        'category_id',
        'open_flg'
    ];

    public function category(){
        return $this -> belongsTo('App\Models\MovieCategory');
    }
}
