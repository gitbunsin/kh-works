<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    //
    protected $table = 'oauth_clients';
    protected $fillable = [
        'id',
        'company_id',
        'client_secret',
        'redirect_uri',
    ];
}
