<?php
namespace App\Model;
use App\OrganizationGenInfo;
use App\Role;
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
        'emp_number',
        'company_id',
        'role_id',
        'email',
        'password',
        'verified',
        'email_token',
        'update_at'
    ];

    public $timestamps = false;
    public function employee(){

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    public function company(){

        return $this->belongsTo(OrganizationGenInfo::class ,'company_id','id');
    }
    public function role(){

        return $this->belongsTo(Role::class,'role_id','id');
    }

}