<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  protected $table = 'appointment';
  public $timestamps = false;
  protected $fillable = ['vehicle_id', 'booking_date', 'appointment_date', 'service_type', 'notes','status'];
  protected $primaryKey = 'appointment_id';

  public function vehicle()
  {
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
  }
}
