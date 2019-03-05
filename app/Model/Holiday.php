<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //
    protected $table = '';
    protected $fillable = [
        'id',
        'employee_id',
        'name',
        'description',
        'date',
        'recurring',
        'length',
        'operational_country_id',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
}
