<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_return extends Model
{
    use HasFactory;
    protected $fillable=['id_vehicle_lending','last_gas','last_km','gas_money'];
    public function vehicle_lending(){
        return $this->belongsTo('App\Models\Vehicle_lending','id_vehicle_lending');
    }
}
