<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transportation;
use App\Models\Vehicle_lending;
use App\Models\Vehicle_return;

class Print_invoiceController extends Controller
{
    //
    public function index(Vehicle_return $print)
    {
        $vehicle_returns= Vehicle_return::with('vehicle_lending')->get();
        // return $vehicle_returns;
        $transportations = Transportation::all();
        $users = User::all();
        $vehicle_lendings = Vehicle_lending::all();
        $times_return = date_convert($print->updated_at);
        $times_lending = Vehicle_lending::where('id', $print->id_vehicle_lending)->select('created_at')->get();
        $times_lending = date_convert($times_lending[0]->created_at);
        $currentDate = now()->format('d-m-Y');

        return view('admin.printInvoice',compact('vehicle_returns', 'transportations', 'users', 'vehicle_lendings','print','times_return','times_lending','currentDate'));
    }

}
