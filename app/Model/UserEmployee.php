<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * @property  attributes
 */
class UserEmployee extends Authenticatable
{
    use Notifiable;
    use EntityTrait;
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
