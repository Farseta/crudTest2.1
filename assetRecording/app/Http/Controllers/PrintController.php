<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Other_asset;
use App\Models\User;
use App\Models\Transportation;
use App\Models\Vehicle_lending;
use App\Models\Vehicle_return;

class PrintController extends Controller
{
    public function index()
    {
        $vehicle_returns= Vehicle_return::with('vehicle_lending')->get();
        // return $vehicle_returns;
        $transportations = Transportation::all();
        $users = User::all();
        $vehicle_lendings = Vehicle_lending::all();
        return view('admin.print',compact('vehicle_returns', 'transportations', 'users', 'vehicle_lendings'));
    }
    public function api(){
        $vehicle_returns = Vehicle_return::with('vehicle_lending')->get();
        // $vehicle_returns = Vehicle_return::all();
        $vehicle_lendings = Vehicle_lending::all();
        $datatables = datatables()->of($vehicle_returns)
        // name user
        ->addColumn('name',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->user->name;
        })
        // brand transportasi
        ->addColumn('brand',function( $vehicle_returns){
            return $vehicle_returns->vehicle_lending->transportation->brand;
        })
        // plat nomor
        ->addColumn('plate',function( $vehicle_returns){
            return  $vehicle_returns->vehicle_lending->transportation->plate;
        })
        
        // gas_last
        ->addColumn('last_gas',function( $vehicle_returns){
            return  $vehicle_returns->last_gas;
        })
        // last_km
        ->addColumn('last_km',function( $vehicle_returns){
            return  $vehicle_returns->last_km;
        })
        // gas_money
        ->addColumn('gas_money_last',function( $vehicle_returns){
            return  $vehicle_returns->vehicle_lending->gas_money;
        })
        // gas_money
        ->addColumn('gas_money',function($vehicle_returns){
            return $vehicle_returns->gas_money;
        })
        // lending_Status
        ->addColumn('status_lending',function( $vehicle_returns){
            return  $vehicle_returns->vehicle_lending->status_lending;
        })
        
        // // vehicle_lending created_at
        // ->addColumn('created_at_lending',function($vehicle_returns){
        //     return $vehicle_returns->vehicle_lending->created_at;
        // })
        // vehicle_lending created_at convert
        ->addColumn('date_convert_created_at_lending',function( $vehicle_returns){
            return date_convert( $vehicle_returns->vehicle_lending->created_at);
        })
        // // // vehicle_return created_At
        // // ->addColumn('created_at_return',function($vehicle_returns){
        // //     return $vehicle_returns->created_at;
        // // })
        // vehicle_Return created_At convert
        ->addColumn('date_convert_created_at',function($vehicle_returns){
            return date_convert($vehicle_returns->created_at);
        })
        ->addIndexColumn();

        return $datatables->make(true);
    }
}
