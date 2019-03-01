<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'customers';
    protected $fillable =
        ['id',
            'company_id',
            'name',
            'description',
            'is_deleted',
        ];
    public $timestamps = false;
}
