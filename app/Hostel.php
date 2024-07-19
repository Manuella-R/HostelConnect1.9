<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{   protected $table = 'Hostels';  
    protected $primaryKey = 'H_id';
    protected $fillable = [
        'H_id','user_id','name', 'address', 'description', 'rent' ,'amenities', 'rules', 'availability','number_beds','vacant_beds','photo_proof1','photo_proof2','photo_proof3','photo_proof4','constant_water_supply','private_security','parking_space','caretaker',
    ];

    // Define the inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        return $this->hasMany(Notification::class, 'H_id'); 
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
