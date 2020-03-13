<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Client;

use App\Category;
use App\Sale;


class Project extends Model
{
    protected $fillable = [
        'projectName',        
        'status',  
        'user_id',      
        'projectDesc',
        'category_id',
        'projectPrice',
        'startDate'
    ];

    public function clients(){
        
        return $this->hasMany('App\Client');

    }


    public function sales(){
        
        return $this->hasMany('App\Sale');

    }

    
  


    public function category(){
        
        return $this->belongsTo('App\Category');
    }



}
