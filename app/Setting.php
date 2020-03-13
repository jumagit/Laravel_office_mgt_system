<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company_name',
        'company_logo',
        'company_contact',
        'company_email',
        'company_address',
        'company_description',
        'user_id',
       
    ];
}
