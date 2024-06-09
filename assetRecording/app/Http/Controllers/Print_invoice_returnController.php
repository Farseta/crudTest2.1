<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transportation;
use App\Models\Vehicle_lending;

class Print_invoice_returnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Vehicle_lending $print)
    {
        $vehicle_returns= Vehicle_lending::with('transportation')->get();
        // return $vehicle_returns;
        $transportations = Transportation::all();
        $users = User::all();
        $vehicle_lendings = Vehicle_lending::all();
        $times_return = date_convert($print->updated_at);
        
        $currentDate = now()->format('d-m-Y');

        return view('admin.printInvoiceLending',compact('vehicle_returns', 'transportations', 'users', 'vehicle_lendings','print','times_return','currentDate'));
    }
}
