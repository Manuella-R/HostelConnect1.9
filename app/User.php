<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email','invitation_token', 'password','is_active','email_verification_code','email_verified_at','establishment_name','phone_number','photo_proof','is_resident','user_role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userDescription()
    {
        return $this->hasOne(UserDescription::class,  'user_id', 'id');
    }
    public function hostel()
{
    return $this->hasOne(Hostel::class, 'user_id'); // Adjust based on your actual relationship
}
public function resident()
    {
        return $this->hasOne(Resident::class, 'user_id', 'id');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
