<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    protected $primaryKey = 'Notification_id';
    protected $fillable = ['H_id', 'notification'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'H_id', 'H_id');
    }
    public function residents()
    {
        return $this->belongsToMany(Resident::class, 'resident_notifications', 'notification_id', 'resident_id');
    }
}
