<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportations = Transportation::all();
        // return $transportations;
        return view('admin.transportation',compact('transportations'));
    }
    public function api(){
        $transportations = Transportation::all();
        $datatables = datatables()->of($transportations)
        ->addColumn('detail',function(){
            return '';
        })
        ->addColumn('date_convert_created_at',function($transportations){
            return date_convert($transportations->created_at);
        })
        ->addColumn('date_convert_updated_at',function($transportations){
            return date_convert($transportations->updated_at);
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
            'type' => ['required'],
            'brand' => ['required'],
            'plate' => ['required'],
            'tax_date'  => ['required'],
            'oil_date' => ['required'],
            'status' => ['required'],
            'last_gas' => ['required'],
            'last_km' => ['required'],
            
        ]);
        // return $request;
        Transportation::create($request->all());
        return redirect('transportations');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportation $transportation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transportation $transportation)
    {
        
        $this->validate($request,[
            'type' => ['required'],
            'brand' => ['required'],
            'plate' => ['required'],
            'tax_date'  => ['required'],
            'oil_date' => ['required'],
            'status' => ['required'],
            'last_gas' => ['required'],
            'last_km' => ['required'],
            
        ]);
        // return $transportation;
        $transportation->update($request->all());
        return redirect('transportations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportation $transportation)
    {
        $transportation->delete();
    }
}
