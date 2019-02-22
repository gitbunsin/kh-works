<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthClicent extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_hr_oauth_client';
    protected $fillable =
         ['client_id',
            'client_secret	',
            'redirect_uri',
        ];
    public $timestamps = false;
}
