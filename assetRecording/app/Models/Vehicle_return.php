<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_return extends Model
{
    use HasFactory;
    protected $fillable=['id_vehicle_lending','id_user_return','last_gas','last_km','gas_money','lending_status'];
    public function vehicle_lending(){
        return $this->belongsTo('App\Models\Vehicle_lending','id_vehicle_lending');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','id_user_return');
    }
}
