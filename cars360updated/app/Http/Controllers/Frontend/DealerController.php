<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Car\Cars;
use App\Models\Car\CarImages;
use App\Models\Car\Brands;


class DealerController extends Controller
{
    public function index($dealerId) {

        $user = User::where('id', 1)->first();

        // $car = Cars::where('car_id', $carId)->first();
        // $data = [];

        // $data['carDetails'] = CarsServices::CarDetails($car->id);
        // $data['other_attributes'] = OtherAttributes::where('cars_id', $car['id'])->first();

        $data=array();
        $data["dealerData"]=array(
            "name"=>$user["first_name"],
            "city"=>$user["city"],
            "phone"=>$user["phone"],   
        );

        $cars= Cars::where('users_id', $dealerId)->paginate(10);
        $carRequiredDetails=array();

        for($i=0; $i<count($cars); $i++){
            // get brand name
            $brand=Brands::where('id', $cars[$i]['brands_id'])->get();

            //get image path
            $imageUniquePath = CarImages::where('cars_id', $cars[$i]['id'])->first();
            $imagePath = url('/uploads/images/cars/'.$cars[$i]['car_id'])."/";
            $frontImage = (($imageUniquePath == null) ? '' : $imagePath.$imageUniquePath['front']);
            
            $reqDetails=array(
                'brand'=> $brand[0]['name'],
                'price' => $cars[0]['price'],
                'frontImage' => $frontImage,
                'carId' => $cars[$i]['car_id'],
            );
            array_push($carRequiredDetails,$reqDetails);
        };

        $data["cars"]=$carRequiredDetails;

        \Log::info(print_r($data, true));

        return view('frontend.dealer', $data);
    }

    // public function saveLead() {
	// 	\Log::info(print_r($_POST,1));
    //     Leads::create([
    //         "cars_id" => 9,
    //         "name"=>$_POST['name'],
    //         "email"=>$_POST['mailId'],
    //         "phone"=> $_POST['phone'],
    //         "status"=> 1,
    //         "user_id"=>"",          
    //     ]);

    //     // return view('frontend.car-details', $data);
    // }
}