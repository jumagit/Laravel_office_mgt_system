<?php

namespace App;

use App\Project;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      
        'projectType',
        'category_price'
    ];

    public function projects(){
        return $this->hasMany('App\Project');
    }
}
