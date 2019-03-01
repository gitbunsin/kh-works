<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    //
    protected $table = 'licenses';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'description',
    ];
}
