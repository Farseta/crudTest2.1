<?php

namespace App\Http\Controllers;
use App\Models\Vehicle_lending;
use App\Models\Vehicle_return;
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
    public function api(){
        $vehicle_lendings = Vehicle_lending::with('transportation','user')->get();
        // $vehicle_lendings = Vehicle_lending::all();
        $datatables = datatables()->of($vehicle_lendings)
        // nama user
        ->addColumn('name',function($vehicle_lendings){
            return $vehicle_lendings->user->name;
        })
        // brand transportasi
        ->addColumn('brand',function($vehicle_lendings){
            return $vehicle_lendings->transportation->brand;
        })
        // plat nomor
        ->addColumn('plate',function($vehicle_lendings){
            return $vehicle_lendings->transportation->plate;
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
        $this->validate($request,[
            'id_user'=>['required'],
            'id_transportation'=>['required'],
            'needs'=>['required'],
            'nameCustomer'=>['required'],
            'phoneNumber'=>['required'],
            'gas_money'=>['required'],
            'status' => ['required'],
            'status_lending' => ['required'],
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
    public function update(Request $request, $id)
    {
        // return$request;
        $this->validate($request,[
            'id_user'=>['required'],
            'id_transportation'=>['required'],
            'nameCustomer'=>['required'],
            'phoneNumber'=>['required'],
            'needs'=>['required'],
            'gas_money'=>['required'],
            'status' => ['required'],
            'status_lending' => ['required'],
        ]);
        $vehicle_lending = Vehicle_lending::find($id);
        if( $request->get('id_transportation') != $request->get('oldIdTransportation')){
            $transportations1 = Transportation::find($request->get('id_transportation'));
            $transportations2 = Transportation::find($request->get('oldIdTransportation'));
            $transportations1->update([
                'status'=>$request->get('status'),
            ]);
            $transportations2->update([
                'status'=>$request->get('oldStatus'),
            ]);
            // return$request;
        };
        
        // return $vehicle_lending;
        // return "benar";
        $vehicle_lending->update([
            'id_user'=>$request->get('id_user'),
            'id_transportation'=>$request->get('id_transportation'),
            'needs'=>$request->get('needs'),
            'gas_money'=>$request->get('gas_money'),
            'status_lending'=>$request->get('status_lending'),
            
        ]);
        
        return redirect('vehicleLends');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle_lending $vehicle_lending,$id)
    {
        // return $request;
        $vehicle_lending = Vehicle_lending::find($id);
        $transportation = Transportation::find($vehicle_lending->id_transportation);
        $transportation->update([
            'status'=>'ready',
        ]);
        $vehicle_lending->update([
            'status_lending'=>'canceled',
            
        ]);
        Vehicle_return::create([
            'id_vehicle_lending'=> $id,
            'last_gas' => $transportation->last_gas,
            'last_km' => $transportation->last_km,
            'gas_money' => $vehicle_lending->gas_money,
            'lending_status'=>'canceled',
        ]);
        return redirect('vehicleLends');
    }
}
