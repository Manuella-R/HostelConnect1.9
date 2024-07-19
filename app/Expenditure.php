<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{    protected $table = 'Expenditures';  
    protected $primaryKey = 'e_id'; // Set the primary key

    protected $fillable = [
        'user_id', 'date', 'type', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
