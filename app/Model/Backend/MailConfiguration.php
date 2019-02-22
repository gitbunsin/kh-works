<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailConfiguration extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_hr_email_configuration';
    protected $fillable =
        ['id',
            'mail_type',
            'sent_as',
            'sendmail_path',
            'smtp_host',
            'smtp_port',
            'smtp_username',
            'smtp_auth_type',
            'smtp_security_type',
        ];
    public $timestamps = false;
}
