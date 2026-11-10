<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    /** @use HasFactory<\Database\Factories\BikeFactory> */
    use HasFactory;

    protected $fillable = [ 
        'serial_number', 
        'model', 
        'price_per_hour', 
        'status', 
    ]; 
    
    protected $casts = [
        'price_per_hour' => 'decimal:2',
    ]; 
    
    public function bookings()
    { 
        return $this->hasMany(Booking::class);
    } 
}
