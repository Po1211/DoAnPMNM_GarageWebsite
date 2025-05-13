<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'phone', 'email'];
    public $timestamps = false;
    protected $primaryKey = 'customer_id';

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'customer_id');
    }
}
