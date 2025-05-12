<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payment extends Model
{
    //
     use HasFactory;

    // Tentukan kolom mana yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama', 
        'metode_pembayaran', 
        'nomor_pembayaran', 
        'total',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
