<?php
namespace App\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property  attributes
 */
class UserEmployee extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_employees';
    protected $fillable = [
        'id',
        'emp_id',
        'company_id',
        'role_id',

        'email',
        'password',
        'verified',
        'email_token',
        'update_at'
    ];
    public $timestamps = false;

}