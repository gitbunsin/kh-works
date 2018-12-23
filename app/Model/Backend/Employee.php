<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * @property  attributes
 */
class Employee extends Authenticatable
{
    use Notifiable;
    use EntityTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //The authentication guard for admin
    protected $guard = 'employee';
    protected $table = 'tbl1_hr_employee';
    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'emp_id',
        'employee_id',
        'emp_lastname',
        'emp_middle_name',
        'emp_nick_name',
        'job_title_code',
        'email_verified_at',
        'verified',
        'email',
        'email_token',
        'password'

    ];
    public $timestamps = false;
    //
}
