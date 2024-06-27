<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDescription extends Model
{
    protected $fillable = [
        'user_id', 'gender', 'age', 'current_year_of_university', 'personality', 'neighbor_expectations', 'self_description', 'additional_info',
    ];

    // Define the inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
