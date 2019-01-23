<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'tbl_location';
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
        'notes',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;

}
