<?php
// CRUD PlayStation untuk admin
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playstation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga_per_jam',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
