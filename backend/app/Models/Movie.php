<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;

    use SoftDeletes;
    
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
