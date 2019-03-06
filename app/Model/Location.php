<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'locations';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'country_code',
        'province',
        'city',
        'address',
        'zip_code',
        'phone',
        'fax',
        'note',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
}
