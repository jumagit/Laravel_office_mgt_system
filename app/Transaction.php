<?php

namespace App;

use App\User;

use App\Client;

use App\Sale;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $fillable = [

        'user_id',
        'sale_id',
        'client_id',        
        'activity'
    ];


    public function sale(){

        return $this->belongsTo('App\Sale');
    }

    public function user(){
        return $this->belongsTo('App\User');
      }

      public function client(){
          return $this->belongsTo('App\Client');
      }


}
