<?php

namespace App;

use App\Sale;

use Illuminate\Database\Eloquent\Model;


class SaleDetails extends Model
{
    protected $fillable = [
        'sale_id',
        'billType',
        'chargeType',
        'amount_to_pay',
        'effectiveDate',
        
     ];
 

     public function sale(){
        return $this->belongsTo('App\Sale');
      }
 
}
