<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    protected $table = 'countries';

    protected $fillable = [
        'id',
        'cou_code',
        'company_id',
        'cou_name',
        'iso3',
        'numcode',
    ];
}
