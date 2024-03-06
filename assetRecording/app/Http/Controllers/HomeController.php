<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Other_asset;
use App\Models\Transportation;
use App\Models\Vehicle_lending;
use App\Models\Vehicle_return;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transportation_total = Transportation::count();
        $transportation_ready = Transportation::where('status', 'ready')->count();
        $transportation_unready = Transportation::where('status', 'unready')->count();
        $other_asset_total = Other_asset::count();

        $label_bar = ['Peminjaman','pengembalian'];
        $data_bar = [];
        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key==1 ? 'rgba(245,40,145,0.8)': 'rgba(40,145,245,0.8)';
            $data_month = [];
            foreach (range(1, 12) as $month) {
                if($key ==0){
                    $data_month []= Vehicle_lending::select(DB::raw("COUNT(*) as total"))
                    ->whereMonth('created_at', $month)
                    ->first()->total;
                }else{
                    $data_month []= Vehicle_return::select(DB::raw("COUNT(*) as total"))
                    ->whereMonth('created_at', $month)
                    ->first()->total;
                }
                
                    
            }
            
            $data_bar[$key]['data'] = $data_month;
        }
        // return $data_bar;
        return view('home', compact('transportation_total', 'other_asset_total', 'transportation_ready', 'transportation_unready','data_bar'));
    }
}
