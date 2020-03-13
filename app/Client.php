<?php

namespace App;

use App\Project;

use App\Transaction;

use App\Cdetail;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'fullName',     
        'email',
        'address',              
        'pcontact',
        'otherContact',               
        'user_id',
        'prospective',
        'about'
    ];

    public function projects(){

      return  $this->belongsToMany('App\Project');
    }

    public function cdetail(){
      return $this->hasOne('App\Cdetail');
    }

    public function transactions(){
      return $this->hasMany('App\Transaction');
    }


    public function sales(){
        
      return $this->hasMany('App\Sale');

  }


    public function user(){
      return $this->belongsTo('App\User');
    }
}
