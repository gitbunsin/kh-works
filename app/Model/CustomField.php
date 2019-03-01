<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'custom_fields';
    protected $fillable =
        ['file_num',
            'extra_data',
            'company_id',
            'screen',
            'type',
            'name',
        ];
    public $timestamps = false;
}
