<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\SoftDeletes;

use App\Profile;

use App\Sale;

use App\Post;

use App\Transaction;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */

     use softDeletes;

    protected $fillable = [
        'name', 'email','firstname','lastname','password', 'added_by','admin'
    ];


    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){

        return $this->hasOne('App\Profile');
    }


    public function client(){

        return $this->hasOne('App\client');
    }


    public function sale(){

        return $this->hasOne('App\Sale');
    }


    
    public function posts(){

        return $this->hasMany('App\Post');
    }


    public function transactions(){

        return $this->hasMany('App\Transaction');
    }









}
