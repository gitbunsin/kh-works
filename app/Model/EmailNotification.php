<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
//        protected $connection = 'mysql';
        protected $table = 'email_notifications';
        protected $fillable =
            ['	id',
                'name',
                'is_enable',
            ];
        public $timestamps = false;
}
