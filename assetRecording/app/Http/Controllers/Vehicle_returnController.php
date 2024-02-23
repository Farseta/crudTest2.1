<?php

namespace App\Http\Controllers;


use App\Models\Vehicle_return;
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
        return view('admin.vehicleReturn',compact('vehicle_returns'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle_return $vehicle_return)
    {
        //
    }
}
