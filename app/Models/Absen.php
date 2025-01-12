<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
