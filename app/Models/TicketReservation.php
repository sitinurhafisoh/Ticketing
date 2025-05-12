<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TicketReservation extends Model
{
    protected $fillable = [
    
        'route_id',
        'transport_name',
        'from',
        'to',
        'departure',
        'price',
        'quantity',
    ];

    // Relasi dengan User (Customer) di database Travelasing
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi ke tabel users
    }
}
