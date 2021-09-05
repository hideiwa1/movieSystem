<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Trainer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sex_id',
        'birthday',
        'club_id',
        'create_flg',
        'category_id',
        'address',
        'tel',
        'status_flg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category(){
        return $this -> belongsTo('App\Models\TrainerCategory');
    }

    public function club(){
        return $this -> belongsTo('App\Models\Club');
    }

    public function sex(){
        return $this -> belongsTo('App\Models\Sex');
    }
}
