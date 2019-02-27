<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_hr_email_notification';
    protected $fillable =
        ['	id',
            'name',
            'is_enable',
        ];
    public $timestamps = false;
}
