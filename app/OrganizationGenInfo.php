<?php

/**
 * Remove 'use Illuminate\Database\Eloquent\Model;'
 */
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property  attributes
 */
class OrganizationGenInfo extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //The authentication guard for admin
    protected $guard = 'admins';
    protected $table = 'organization_gen_infos';
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
        'email_token',
        'verified',
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
