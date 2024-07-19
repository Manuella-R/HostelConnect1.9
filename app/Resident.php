<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $primaryKey = 'R_id';
    protected $fillable = ['user_id', 'H_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'H_id', 'H_id');
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'resident_notifications', 'R_id', 'notification_id');
    }
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'R_id', 'ticket_id');
    }
}
