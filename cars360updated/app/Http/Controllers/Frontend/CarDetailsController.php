<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes\OtherAttributes;
use App\Models\Car\Cars;
use App\Services\CarsServices;
use Illuminate\Http\Request;
use App\Models\Leads;


class CarDetailsController extends Controller
{
    public function details($carId) {
        $car = Cars::where('car_id', $carId)->first();
        $data = [];

        $data['carDetails'] = CarsServices::CarDetails($car->id);
        $data['other_attributes'] = OtherAttributes::where('cars_id', $car['id'])->first();
        $data['carId']=$car['id'];

        \Log::info(print_r($data, true));

        return view('frontend.car-details', $data);
    }

    public function saveLead() {
		\Log::info(print_r($_POST,1));
        Leads::create([
            "cars_id" =>$_POST['carId'] ,
            "name"=>$_POST['name'],
            "email"=>$_POST['mailId'],
            "phone"=> $_POST['phone'],
            "status"=> 1,
            "user_id"=> $_POST['userId'], //Car dealer id    
            "appointment_time"=> $_POST['appointmentTime']
        ]);

        // return view('frontend.car-details', $data);
    }
}