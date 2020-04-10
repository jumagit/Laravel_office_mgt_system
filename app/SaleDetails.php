<?php

namespace App;

use App\Sale;

use Illuminate\Database\Eloquent\Model;


class SaleDetails extends Model
{
    protected $fillable = [
        'sale_id',
        'amount',
        'transaction_id'     
       
        
     ];

    

     public function sale(){
        return $this->belongsTo('App\Sale');
      }
 
}
