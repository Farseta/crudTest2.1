<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_lending extends Model
{
    use HasFactory;
    protected $fillable=['id_user','id_transportation','needs','nameCustomer','phoneNumber','gas_money','status_lending'];
    public function transportation(){
        return $this->belongsTo('App\Models\Transportation','id_transportation');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','id_user');
    }
    public function vehicle_lendings(){
        return $this->hasMany('App\Models\Vehicle_return','id_vehicle_lending');
    }
   
}
