<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property  attributes
 */
class UserEmployee extends Authenticatable
{
    use Notifiable;

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
