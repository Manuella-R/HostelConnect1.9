<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
 

    protected $table = 'tickets'; // Specify the table name if different from 'tickets'

    protected $primaryKey = 'ticket_id'; // Specify the primary key if different from 'id'

    protected $fillable = [
        'R_id',
        'ticket',
        'is_solved',
    ];


    public function resident()
    {
        return $this->belongsTo(Resident::class, 'R_id', 'R_id');
    }
}
