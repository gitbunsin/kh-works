<?php
namespace App;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property mixed country
 */
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'status',
        'sex',
        'user_level',
        'address',
        'country',
        'tel',
        'mobile',
        'website',
        'users_ip',
        'approved',
        'activation_code',
        'emailme_act',
        'ckey',
        'ctime',
        'city',
        'photo',
        'experiences',
        'dob',
        'date',
        'email_verified_at',
        'remember_token',
        'email_token',
        'verified',
        'create_at',
        'update_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;
    /**
     * Add a mutator to ensure hashed passwords
     */
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}