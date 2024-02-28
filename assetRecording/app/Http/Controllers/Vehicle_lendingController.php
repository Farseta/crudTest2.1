<?php

namespace App\Http\Controllers;
use App\Models\Vehicle_lending;
use App\Models\User;
use App\Models\Transportation;
use Illuminate\Http\Request;

class Vehicle_lendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle_lendings = Vehicle_lending::with('transportation','user')->get();
        $transportations = Transportation::all();
        $users = User::all();
        // return $vehicle_lendings ;
        return view('admin.vehicleLend',compact('vehicle_lendings','transportations','users'));
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
        $this->validate($request,[
            'id_user'=>['required'],
            'id_transportation'=>['required'],
            'needs'=>['required'],
            'gas_money'=>['required'],
            'status' => ['required'],
        ]);
        
        $transportations = Transportation::find($request->get('id_transportation'));
        // $transportations = Transportation::all();
        // return  $request;
        // $transportations->status->
        $transportations->update([
            'status'=>$request->get('status'),
        ]);
        Vehicle_lending::create($request->all());
        return redirect('vehicleLends');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle_lending $vehicle_lending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle_lending $vehicle_lending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle_lending $vehicle_lending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle_lending $vehicle_lending)
    {
        //
    }
}
