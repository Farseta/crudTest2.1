<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;
    protected $fillable=['type','brand','plate','tax_Date','oil_date','status','last_gas','last_km'];
    public function vehicle_lendings(){
        return $this->hasMany('App\Models\vehicle_lending','id_transportation');
    }
    
}
