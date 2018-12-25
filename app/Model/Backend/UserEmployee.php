<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmployee extends Model
{
    protected $table = 'tbl_user_employee';
    protected $fillable = [
        'id',
        'emp_id',
        'company_id',
        'role_id',
        'email',
        'password',
        'email_token',
        'update_at'
    ];
    public $timestamps = false;

}
