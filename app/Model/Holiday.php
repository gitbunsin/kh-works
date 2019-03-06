<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //
    protected $table = 'holidays';
    protected $fillable = [
        'id',
        'company_id',
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
