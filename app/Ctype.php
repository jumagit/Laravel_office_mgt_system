<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Cdetail;



class Ctype extends Model
{
    
    protected $fillable = [
        'name'
    ];

    public function cdetail(){

        return $this->hasMany('App\Cdetail');
        
    }
}

