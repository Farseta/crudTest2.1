<?php

namespace App\Http\Controllers;


use App\Models\Vehicle_return;
use App\Models\User;
use App\Models\Vehicle_lending;
use App\Models\Transportation;
use Illuminate\Http\Request;

class Vehicle_returnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle_returns= Vehicle_return::with('vehicle_lending')->get();
        // return $vehicle_returns;
        $transportations = Transportation::all();
        $users = User::all();
        $vehicle_lendings = Vehicle_lending::all();
        return view('admin.vehicleReturn',compact('vehicle_returns', 'transportations', 'users', 'vehicle_lendings'));
    }
    public function api(){
        $vehicle_returns = Vehicle_return::with('vehicle_lending')->get();
        // $vehicle_returns = Vehicle_return::all();
        $datatables = datatables()->of($vehicle_returns)
        // name user
        ->addColumn('name',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->user->name;
        })
        // name customer
        ->addColumn('nameCustomer',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->nameCustomer;
        })
        // phone Number Customer
        ->addColumn('phoneNumber',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->phoneNumber;
        })
        // brand transportasi
        ->addColumn('brand',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->transportation->brand;
        })
        // plat nomor
        ->addColumn('plate',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->transportation->plate;
        })
        
        
        // gas_money
        ->addColumn('gas_money_last',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->gas_money;
        })
        
        // vehicle_lending created_at
        ->addColumn('created_at_lending',function($vehicle_returns){
            return $vehicle_returns->vehicle_lending->created_at;
        })
        // vehicle_lending created_at convert
        ->addColumn('date_convert_created_at_lending',function($vehicle_returns){
            return date_convert($vehicle_returns->vehicle_lending->created_at);
        })
        // vehicle_return created_At
        ->addColumn('created_at_return',function($vehicle_returns){
            return $vehicle_returns->created_at;
        })
        // vehicle_Return created_At convert
        ->addColumn('date_convert_created_at',function($vehicle_returns){
            return date_convert($vehicle_returns->created_at);
        })
        ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $vehicle_lendings = Vehicle_lending::find($request->get('id_vehicle_lending'));
        $transportations = Transportation::find($vehicle_lendings->id_transportation);
        $this ->validate($request,[
            'id_vehicle_lending'=>['required'],
            'last_gas'=>['required'],
            'last_km'=>['required'],
            'gas_money'=>['required'],
            'lending_status'=>['required'],
        ]);
        $vehicle_lendings->update([
            'status_lending'=>$request->get('lending_status'),
        ]);
        $transportations->update([
            'status'=>$request->get('status'),
            'last_km'=>$request->get('last_km'),
            'last_gas'=>$request->get('last_gas'),
        ]);
        Vehicle_return::create($request->all());
        return redirect('vehicleReturns');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle_return $vehicle_return)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle_return $vehicle_return)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle_return $vehicle_return)
    {
        $vehicle_lendings = Vehicle_lending::all();
        $this ->validate($request,[
            'id_vehicle_lending'=>['required'],
            'last_gas'=>['required'],
            'last_km'=>['required'],
            'gas_money'=>['required'],
            'status'=>['required'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle_return $vehicle_return)
    {
        //
    }
}
