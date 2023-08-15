<?php

namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leads;
use Auth;
use App\Models\Car\Brands;
use App\Models\Car\Cars;

class LeadController extends Controller
{
    public function list(Request $request) {
        
        $date=$request->input('date')!=""? $request->input('date') : date('Y-m-d');
        $leads= Leads::where('user_id', Auth::user()->id)->whereDate('created_at', $date)->orderBy('created_at', 'DESC')->paginate(10);

        $data=array('leads'=> array());

        for($i=0; $i<count($leads); $i++){
            // get brand id
            $cars=Cars::where('id', $leads[$i]['cars_id'])->first();
            // $brand=Brands::where('id', $cars['brands_id'])->first();

            $reqDetails=array(
                'brand'=> $cars['brands_id'],
                'name' => $leads[$i]['name'],
                'email' => $leads[$i]['email'],
                'phone' => $leads[$i]['phone'],
                'status' => $leads[$i]['status'],
                'carsId'=>$leads[$i]['cars_id'],
                'date'=> $leads[$i]['appointment_time']
            );
            array_push($data['leads'],$reqDetails);
        };

        // Filters Defaults
        $data['brands'] = Brands::orderBy('name', 'ASC')->pluck('name', 'id');

        // \Log::info(print_r( $request->input('dates'), true));


        return view('panel.leads.list',$data);
    }
}
