<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\HostelOwner as Authenticatable;
use Illuminate\Notifications\Notifiable;

class HostelOwner extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'BusinessPermit', 'phone_number', 'is_active', 'email_verification_code', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define a one-to-many relationship with Hostel.
     */
    public function hostels()
    {
        return $this->hasMany(Hostel::class, 'HO_id');
    }
}
