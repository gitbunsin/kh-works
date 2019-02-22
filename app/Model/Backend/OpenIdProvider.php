<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenIdProvider extends Model
{
    //
    protected $table = 'tbl_hr_openid_provider';
    protected $fillable = [
        'id',
        'company_id',
        'provider_name',
        'provider_url',
        'status',
    ];
    public $timestamps = false;
}
