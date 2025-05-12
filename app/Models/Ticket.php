<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
        protected $fillable = [
       
        'route_id',
        'transport_name',
        'from',
        'to',
        'departure',
        'price',
        'quantity',
        ];
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
