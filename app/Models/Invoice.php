<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'email',
        'email',
        'code',
        'status',
        'memo',
        'phone',
        'country',
        'passenger',
        'date_booking',
        'rental_duration',
        'pickup_location',
        'pickup_time',
        'name',
        'car_id',
        'driver_id',
    ];

    public function cars(){
        return $this->belongsTo(Cars::class,'car_id','id');
    }
    public function drivers(){
        return $this->belongsTo(Drivers::class,'driver_id','id');
    }
}
