<?php

/**
 * Remove 'use Illuminate\Database\Eloquent\Model;'
 */
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * @property  attributes
 */
class Organization extends Authenticatable
{
    use Notifiable;
    use EntityTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //The authentication guard for admin
    protected $guard = 'admins';
    protected $connection = 'mysql2';
    protected $table = 'tbl_organization_gen_info';
    protected $fillable = [
        'name',
        'email',
        'password',
        'tax_id',
        'registration_number',
        'phone',
        'fax',
        'country',
        'province',
        'city',
        'zip_code',
        'street1',
        'street2',
        'note',
        'postal_address',
        'website',
        'mobile',
        'status',
    ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }
}
