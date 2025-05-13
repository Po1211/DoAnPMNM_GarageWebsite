<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $fillable = ['customer_id', 'vehicle_type', 'vehicle_traveled', 'vehicle_plate'];
    public $timestamps = false;
    protected $primaryKey = 'vehicle_id';

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'vehicle_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
