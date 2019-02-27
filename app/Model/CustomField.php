<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{

    protected $connection = 'mysql';
    protected $table = 'hs_hr_custom_fields';
    protected $fillable =
        ['field_num',
            'name',
            'type',
            'screen',
            'extra_data',
        ];
    public $timestamps = false;
}
