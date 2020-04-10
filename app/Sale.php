<?php

namespace App;

use App\User;

use App\Project;

use App\Client;

use App\SaleDetails;

use App\Transaction;

use App\Other_charges;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
       'project_id',
       'amount_sold',
       'otherCharges',
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


      public function saledetails(){
        return $this->hasOne('App\SaleDetails');
      }

      public function other_charges(){
        return $this->hasOne('App\Other_charges');
      }


      public function project(){
        return $this->belongsTo('App\Project');
      }


      public function other_charges_income(){
        return $this->belongsTo('App\Other_charges_income');
    }


      public function client(){
        return $this->belongsTo('App\Client');
      }

   




}
