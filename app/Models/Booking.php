<?php
// Booking PlayStation oleh user
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'playstation_id',
        'durasi',
        'total_harga',
        'status'
    ];

    public function playstation()
    {
        return $this->belongsTo(Playstation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
