<?php
namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed country
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $connection ='mysql';
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'md5_id',
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
}