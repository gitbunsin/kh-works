<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OpenidProvider extends Model
{
    //
    protected $table = 'openid_providers';
    protected $fillable = [
        'id',
        'company_id',
        'name',
    ];
}
