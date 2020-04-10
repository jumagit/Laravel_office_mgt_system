<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Other_charges;

use App\Sale;

class Other_charges_income extends Model
{
    protected $fillable = [
      'income','months','service_end_date','other_charges_id',

    ];

    public function other_charges(){
        return $this->belongsTo('App\Other_charges');
    }

    public function sale(){
        return $this->belongsTo('App\Sale');
    }
}
