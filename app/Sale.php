<?php

namespace App;

use App\User;

use App\Project;

use App\Client;

use App\SaleDetails;

use App\Transaction;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
       'project_id',
       'amount_sold',
       'payment_status',
       'amount_paid',
       'balance',
       'nextPDate',
       'client_id',
       'user_id'
    ];


    public function user(){
        return $this->belongsTo('App\User');
      }

      public function transaction(){
        return $this->hasOne('App\Transaction');
      }


      public function saledetail(){
        return $this->hasOne('App\SaleDetails');
      }


      public function project(){
        return $this->belongsTo('App\Project');
      }


      public function client(){
        return $this->belongsTo('App\Client');
      }

      static function getBalanceAttribute($val1, $val2){

        return intVal($val1 - $val2);

      }




}
