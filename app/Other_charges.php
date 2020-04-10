<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

use App\Other_charges_income;

class Other_charges extends Model
{
    protected $fillable = [
        'sale_id',
        'chargeType',
        'billType',
        'gracePeriod',
        'agreedAmount',
        'effectiveDate',
        'enpDate',
    ];


    public function sale(){
        return $this->belongsTo('App\Sale');
    }

    public function other_charges_income(){
        return $this->hasOne('App\Other_charges_income');
    }
}
