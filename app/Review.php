<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Define the table name (optional, but good practice)
    protected $table = 'reviews';

    // Specify the primary key
    protected $primaryKey = 'Review_id';

    // Allow mass assignment for the specified fields
    protected $fillable = ['R_id', 'review', 'flagged'];

    // Define the relationship with the Resident model
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'R_id');
    }
}
