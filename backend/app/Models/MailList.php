<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailList extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'admin_id',
        'trainer_id',
        'email',
    ];

    public function trainers(){
        return $this -> hasMany('App\Models\Trainer');
    }

    public function admins(){
        return $this -> hasMany('App\Models\Admin');
    }
}
