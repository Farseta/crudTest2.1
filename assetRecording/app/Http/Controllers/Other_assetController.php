<?php

namespace App\Http\Controllers;

use App\Models\Other_asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Other_assetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $other_assets = Other_asset::all();
        // return $otherAssets;
        return view('admin.otherAsset',compact('other_assets'));
    }
    public function api(){
        $other_assets = Other_asset::all();
        $datatables = datatables()->of($other_assets)->addIndexColumn();

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
        // return $request->file('image')->store('post-images');
        $this ->validate($request,[
            'type'=>['required'],
            'pict'=>['file'],
        ]);
        if($pict = $request->file('pict')){
            $destinationPath = 'post-images/';
            $pictName = date('YmdHis') . "." . $pict->getClientOriginalExtension();
            // $pict->move($destinationPath, $pictName);
            $pict->storeAs($destinationPath,  $pictName);
            $pictPath = $destinationPath . $pictName;
        };
        
        Other_asset::create([
            'type' => $request->type,
            'pict' => $pictPath,
        ]);
        
        // $validatedData['pict'] = $request->file('pict')->store('post-images');
        // Other_asset::create($request->all());
        return redirect('otherAssets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Other_asset $other_asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Other_asset $other_asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this ->validate($request,[
            'type'=>['required'],
            'pict'=>['file'],
        ]);
        // $test = Other_asset::find($id);
        // $test->type = $request->input('type');
        // return $request->oldPict;
        if($pict = $request->file('pict')){
            if($request->oldPict){
                Storage::disk('public')->delete($request->oldPict);
            }
            $destinationPath = 'post-images/';
            $pictName = date('YmdHis') . "." . $pict->getClientOriginalExtension();
            // $pict->move($destinationPath, $pictName);
            $pict->storeAs($destinationPath,  $pictName);
            $pictPath = $destinationPath . $pictName;
           
        };
        $test = Other_asset::find($id);
        // $test->type = $request->input('type');
        // $test->pict = $request->input($pictPath);
        $test->update([
            'type' => $request->type,
            'pict' => $pictPath,
        ]);
        // return $request;
        // return $test;
        // $test->update();
        
        
        // return $other_asset;
        // $$test->update($request->all());
        return redirect('otherAssets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $test = Other_asset::find($id);
        // return $test->pict;
        if($test->pict){
            Storage::disk('public')->delete($test->pict);
        }
        $test->delete();
        // return redirect('otherAssets');
    }
}
