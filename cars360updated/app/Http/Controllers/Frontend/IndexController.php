<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Cars;
use App\Models\Car\CarImages;
use App\Models\Car\Brands;



class IndexController extends Controller
{
    public function home() {
        $i=0;
        $data=array("data"=> array());
        $cars = Cars::orderBy('created_at', 'DESC')->paginate(2);
        // \Log::info(print_r($cars, true));

        for($i=0; $i<count($cars); $i++){
            // get brand name
            $brand=Brands::where('id', $cars[$i]['brands_id'])->get();

            //get image path
            $imageUniquePath = CarImages::where('cars_id', $cars[$i]['id'])->first();
            $imagePath = url('/uploads/images/cars/'.$cars[$i]['car_id'])."/";
            // \Log::info(print_r($imageUniquePath, true));
            $frontImage = (($imageUniquePath == null) ? '' : $imagePath.$imageUniquePath['front']);
            
            // $brand="aaaa";
            $reqDetails=array(
                'brand'=> $brand[0]['name'],
                'price' => $cars[0]['price'],
                'frontImage' => $frontImage,
                'carId' => $cars[$i]['car_id'],
            );
            array_push($data['data'],$reqDetails);
        };
        
        // \Log::info(print_r($data, true));
 

        return view('frontend.index', $data);
    }

    public function searchCars(Request $request){
        $search_str=$request->input('details');
        $cars=array();
        $temp=array();
        $finalResults=array("data"=> array());


        $data = Brands::where('id', $search_str)
        ->orWhere('name', 'LIKE', "%{$search_str}%")
        ->orWhere('meta_title',  'LIKE', "%{$search_str}%" )->get();

        foreach($data as $key => $val ){
            $temp=Cars::where('id',$data[$key]['id'])->get()->toArray();
            $cars=array_merge($cars,$temp);
        }

        for($i=0; $i<count($cars); $i++){
            // get brand name
            $brand=Brands::where('id', $cars[$i]['brands_id'])->get();

            //get image path
            $imageUniquePath = CarImages::where('cars_id', $cars[$i]['id'])->first();
            $imagePath = url('/uploads/images/cars/'.$cars[$i]['car_id'])."/";
            // \Log::info(print_r($imageUniquePath, true));
            $frontImage = (($imageUniquePath == null) ? '' : $imagePath.$imageUniquePath['front']);
            
            // $brand="aaaa";
            $reqDetails=array(
                'brand'=> $brand[0]['name'],
                'price' => $cars[0]['price'],
                'frontImage' => $frontImage,
                'carId' => $cars[$i]['car_id'],
            );
            array_push($finalResults['data'],$reqDetails);
        };

        \Log::info(print_r($finalResults, true));

        echo json_encode($finalResults);

    }

}
