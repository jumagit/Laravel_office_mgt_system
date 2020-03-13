<?php

namespace App;

use App\Client;
use App\Ctype;
use Illuminate\Database\Eloquent\Model;

class Cdetail extends Model
{
    protected $fillable = [
        'client_id',
        'user_id',        
        'ctype_id'
    ];


    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function ctype(){
        return $this->belongsTo('App\Ctype');
    }
}
