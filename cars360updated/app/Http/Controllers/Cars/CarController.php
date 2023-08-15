<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Cars;
use App\Models\Car\Brands;
use App\Models\Car\CarImages;
use App\Models\Car\CarCategory;
use  App\Models\Attributes\AttributeColor;
use  App\Models\Attributes\AttributeFuelType;
use  App\Models\Attributes\AttributeOwnerType;
use  App\Models\Attributes\AttributeTransmissionType;
use  App\Models\Attributes\OtherAttributes;
use Auth;
use Validator;
use Session;

class CarController extends Controller
{

    public function carFilters(Request $request){

        $filters=$request->input('details');
        \Log::info(print_r($filters, true));

        $filtersArray=array();

        foreach($filters as $key => $val ){
           array_push($filtersArray, [$key, '=', $val]);
        }
        \Log::info(print_r($filtersArray, true));

        $cars = Cars::where($filtersArray)->get();

        \Log::info(print_r($cars, true));
        echo json_encode($cars);
 
    }

    public function list(Request $request) {
        $cars = Cars::orderBy('created_at', 'DESC')->get();
        $data = $this->getFormDefaults();
        $data['cars'] = $cars;
        $data['statuses'] = Cars::$STATUSES;
        \Log::info(print_r($data, true));

        return view('panel.cars.list', $data);
    }

    public function add() {
        $data = $this->getFormDefaults();

        return view('panel.cars.form', $data);
    }

    public function create(Request $request) {
        $input = $request->input();
        $car_id = uniqid();
        $path = public_path().'/uploads/images/cars/'.$car_id."/";
        $file = $request->file();

        $validate = $this->car_validations($input);

        if($validate->fails()) {
            Session::flash('error','Please fill the form properly');
            return redirect(url('panel/cars/add'))->withErrors($validate)->withInput();
        }
        else {
            $car = Cars::create([
                "car_id" => $car_id,
                "users_id" => Auth::user()->id,
                "brands_id" => $input['brands_id'],
                "car_category_id" => $input['car_category_id'],
                "model" => $input['model'],
                "variant" => $input['variant'],
                "year" => $input['year'],
                "kilometer" => $input['kilometer'],
                "attribute_owner_type_id" => $input['attribute_owner_type_id'],
                "condition" => $input['condition'],
                "attribute_transmission_type_id" => $input['attribute_transmission_type_id'],
                "seo_information_id"=>1,
                "attribute_fuel_type_id" => $input['attribute_fuel_type_id'],
                "attribute_color_id" => $input['attribute_color_id'],
                "no_of_seats" => $input['no_of_seats'],
                "tax" => $input['tax'],
                "insurance" => $input['insurance'],
                "price" => $input['price'],
                "contact_number" => $input['contact_number'],
                "state" => $input['state'],
                "city" => $input['city'],
                "rto" => $input['rto'],
                "address" => $input['address'],
            ]);

            // create the values for car attributes
            $car_attributes = OtherAttributes::create([
                "cars_id" => $car->id,
                // "music_system" => isset($input['music_system']) ? $input['music_system'] : 0,
                "ac" => isset($input['ac']) ? $input['ac'] : 0,
                "heater" => isset($input['heater']) ? $input['heater'] : 0,
                "air_bags" => isset($input['air_bags']) ? $input['air_bags'] : 0,
                "power_window" => isset($input['power_window']) ? $input['power_window'] : 0,
                "adjustable_steering" => isset($input['adjustable_steering']) ? $input['adjustable_steering'] : 0,
                "power_steering" => isset($input['power_steering']) ? $input['power_steering'] : 0,
                "power_windows_front" => isset($input['power_windows_front']) ? $input['power_windows_front'] : 0,
                "power_windows_rear" => isset($input['power_windows_rear']) ? $input['power_windows_rear'] : 0,
                "remote_fuel_lid_opener" => isset($input['remote_fuel_lid_opener']) ? $input['remote_fuel_lid_opener'] : 0,
                "low_fuel_warning_light" => isset($input['low_fuel_warning_light']) ? $input['low_fuel_warning_light'] : 0,
                "vanity_mirror" => isset($input['vanity_mirror']) ? $input['vanity_mirror'] : 0,
                "rear_seat_head_rest" => isset($input['rear_seat_head_rest']) ? $input['rear_seat_head_rest'] : 0,
                // "rear_seat_center_arm_rest" => isset($input['rear_seat_center_arm_rest']) ? $input['rear_seat_center_arm_rest'] : 0,
                "cup_holder_front" => isset($input['cup_holder_front']) ? $input['cup_holder_front'] : 0,
                "cup_holder_rear" => isset($input['cup_holder_rear']) ? $input['cup_holder_rear'] : 0,
                "anti_lock_braking_system" => isset($input['anti_lock_braking_system']) ? $input['anti_lock_braking_system'] : 0,
                "power_door_locks" => isset($input['power_door_locks']) ? $input['power_door_locks'] : 0,
                "child_safety_locks" => isset($input['child_safety_locks']) ? $input['child_safety_locks'] : 0,
                "anti_theft_alarm" => isset($input['anti_theft_alarm']) ? $input['anti_theft_alarm'] : 0,
                "driver_airbags" => isset($input['driver_airbags']) ? $input['driver_airbags'] : 0,
                "passenger_airbags" => isset($input['passenger_airbags']) ? $input['passenger_airbags'] : 0,
                "rear_seat_belts" => isset($input['rear_seat_belts']) ? $input['rear_seat_belts'] : 0,
                "seat_belt_warning" => isset($input['seat_belt_warning']) ? $input['seat_belt_warning'] : 0,
                "adjustable_seats" => isset($input['adjustable_seats']) ? $input['adjustable_seats'] : 0,
                "keyless_entry" => isset($input['keyless_entry']) ? $input['keyless_entry'] : 0,
                "immobilizer" => isset($input['immobilizer']) ? $input['immobilizer'] : 0,
                // "adjustable_head_lights" => isset($input['adjustable_head_lights']) ? $input['adjustable_head_lights'] : 0,
                "power_adjustable_exterior_rear_view_mirror" => isset($input['power_adjustable_exterior_rear_view_mirror']) ? $input['power_adjustable_exterior_rear_view_mirror'] : 0,
                "alloy_wheels" => isset($input['alloy_wheels']) ? $input['alloy_wheels'] : 0,
                "tinted_glass" => isset($input['tinted_glass']) ? $input['tinted_glass'] : 0,
                "front_fog_lights" => isset($input['front_fog_lights']) ? $input['front_fog_lights'] : 0,
                "rear_window_defogger" => isset($input['rear_window_defogger']) ? $input['rear_window_defogger'] : 0,
                "manually_adjustable_exterior_rear_view_mirror" => isset($input['manually_adjustable_exterior_rear_view_mirror']) ? $input['manually_adjustable_exterior_rear_view_mirror'] : 0,
                "electric_folding_rear_view_mirror" => isset($input['electric_folding_rear_view_mirror']) ? $input['electric_folding_rear_view_mirror'] : 0,
                "rain_sensing_wipers" => isset($input['rain_sensing_wipers']) ? $input['rain_sensing_wipers'] : 0,
            ]);

            $car_images = [
                "cars_id" => $car->id,
                "front" => null,
                "rear" => null,
                "left" => null,
                "right" => null,
                "top" => null,
                "wheels" => null,
                "interior_dashboard" => null,
                "interior_back" => null,
            ];

            // upload the images
            if( isset($file['front_photo']) && !empty($file['front_photo']) ) {
                $front_photo = 'front_photo_'.uniqid().".".$file['front_photo']->getClientOriginalExtension();

                $file['front_photo']->move( $path, $front_photo);
                $car_images['front'] = $front_photo;
            }

            if( isset($file['left_photo']) && !empty($file['left_photo']) ) {
                $left_photo = 'left_photo_'.uniqid().".".$file['left_photo']->getClientOriginalExtension();

                $file['left_photo']->move( $path, $left_photo);
                $car_images['left'] = $left_photo;
            }

            if( isset($file['right_photo']) && !empty($file['right_photo']) ) {
                $right_photo = 'right_photo_'.uniqid().".".$file['right_photo']->getClientOriginalExtension();

                $file['right_photo']->move( $path, $right_photo);
                $car_images['right'] = $right_photo;
            }

            if( isset($file['rear_photo']) && !empty($file['rear_photo']) ) {
                $rear_photo = 'rear_photo_'.uniqid().".".$file['rear_photo']->getClientOriginalExtension();

                $file['rear_photo']->move( $path, $rear_photo);
                $car_images['rear'] = $rear_photo;
            }

            if( isset($file['interior_photo']) && !empty($file['interior_photo']) ) {
                $interior_photo = 'interior_photo_'.uniqid().".".$file['interior_photo']->getClientOriginalExtension();

                $file['interior_photo']->move( $path, $interior_photo);
                $car_images['interior_dashboard'] = $interior_photo;
            }

            if( isset($file['wheels_photo']) && !empty($file['wheels_photo']) ) {
                $wheels_photo = 'wheels_photo_'.uniqid().".".$file['wheels_photo']->getClientOriginalExtension();

                $file['wheels_photo']->move( $path, $wheels_photo);
                $car_images['wheels'] = $wheels_photo;
            }

            CarImages::create($car_images);

            Session::flash('success','Car addedd successfully');
            return back();
        }
        
        
    }

    public function update(Request $request) {
        $input = $request->input();
        $path = public_path().'/uploads/images/cars/'.$input['car_id']."/";
        $file = $request->file();
        $validate = $this->car_validations($input);

        if($validate->fails()) {
            Session::flash('error','Please fill the form properly');
            return redirect(url('panel/cars/edit/'.$input['car_id']))->withErrors($validate)->withInput();
        }
        else {
            // get the car
            $car = Cars::where('car_id', $input['car_id'])->first();
            
            if(empty($car)) {
                Session::flash('error','Invalid car');
                return back();
            }
            else {
                $car->update([
                    "brands_id" => $input['brands_id'],
                    "car_category_id" => $input['car_category_id'],
                    "model" => $input['model'],
                    "variant" => $input['variant'],
                    "year" => $input['year'],
                    "kilometer" => $input['kilometer'],
                    "attribute_owner_type_id" => $input['attribute_owner_type_id'],
                    "condition" => $input['condition'],
                    "attribute_transmission_type_id" => $input['attribute_transmission_type_id'],
                    "attribute_fuel_type_id" => $input['attribute_fuel_type_id'],
                    "attribute_color_id" => $input['attribute_color_id'],
                    "no_of_seats" => $input['no_of_seats'],
                    "tax" => $input['tax'],
                    "insurance" => $input['insurance'],
                    "price" => $input['price'],
                    "contact_number" => $input['contact_number'],
                    "state" => $input['state'],
                    "city" => $input['city'],
                    "rto" => $input['rto'],
                    "address" => $input['address'],
                ]);
                
                // get car attribute
                $car_attributes = OtherAttributes::where('cars_id', $car->id)->first();
                
                if(!empty( $car_attributes)) {
                    $car_attributes->update([
                        // "music_system" => isset($input['music_system']) ? $input['music_system'] : 0,
                        "ac" => isset($input['ac']) ? $input['ac'] : 0,
                        "heater" => isset($input['heater']) ? $input['heater'] : 0,
                        "air_bags" => isset($input['air_bags']) ? $input['air_bags'] : 0,
                        "power_window" => isset($input['power_window']) ? $input['power_window'] : 0,
                        "adjustable_steering" => isset($input['adjustable_steering']) ? $input['adjustable_steering'] : 0,
                        "power_steering" => isset($input['power_steering']) ? $input['power_steering'] : 0,
                        "power_windows_front" => isset($input['power_windows_front']) ? $input['power_windows_front'] : 0,
                        "power_windows_rear" => isset($input['power_windows_rear']) ? $input['power_windows_rear'] : 0,
                        "remote_fuel_lid_opener" => isset($input['remote_fuel_lid_opener']) ? $input['remote_fuel_lid_opener'] : 0,
                        "low_fuel_warning_light" => isset($input['low_fuel_warning_light']) ? $input['low_fuel_warning_light'] : 0,
                        "vanity_mirror" => isset($input['vanity_mirror']) ? $input['vanity_mirror'] : 0,
                        "rear_seat_head_rest" => isset($input['rear_seat_head_rest']) ? $input['rear_seat_head_rest'] : 0,
                        // "rear_seat_center_arm_rest" => isset($input['rear_seat_center_arm_rest']) ? $input['rear_seat_center_arm_rest'] : 0,
                        "cup_holder_front" => isset($input['cup_holder_front']) ? $input['cup_holder_front'] : 0,
                        "cup_holder_rear" => isset($input['cup_holder_rear']) ? $input['cup_holder_rear'] : 0,
                        "anti_lock_braking_system" => isset($input['anti_lock_braking_system']) ? $input['anti_lock_braking_system'] : 0,
                        "power_door_locks" => isset($input['power_door_locks']) ? $input['power_door_locks'] : 0,
                        "child_safety_locks" => isset($input['child_safety_locks']) ? $input['child_safety_locks'] : 0,
                        "anti_theft_alarm" => isset($input['anti_theft_alarm']) ? $input['anti_theft_alarm'] : 0,
                        "driver_airbags" => isset($input['driver_airbags']) ? $input['driver_airbags'] : 0,
                        "passenger_airbags" => isset($input['passenger_airbags']) ? $input['passenger_airbags'] : 0,
                        "rear_seat_belts" => isset($input['rear_seat_belts']) ? $input['rear_seat_belts'] : 0,
                        "seat_belt_warning" => isset($input['seat_belt_warning']) ? $input['seat_belt_warning'] : 0,
                        "adjustable_seats" => isset($input['adjustable_seats']) ? $input['adjustable_seats'] : 0,
                        "keyless_entry" => isset($input['keyless_entry']) ? $input['keyless_entry'] : 0,
                        "immobilizer" => isset($input['immobilizer']) ? $input['immobilizer'] : 0,
                        // "adjustable_head_lights" => isset($input['adjustable_head_lights']) ? $input['adjustable_head_lights'] : 0,
                        "power_adjustable_exterior_rear_view_mirror" => isset($input['power_adjustable_exterior_rear_view_mirror']) ? $input['power_adjustable_exterior_rear_view_mirror'] : 0,
                        "alloy_wheels" => isset($input['alloy_wheels']) ? $input['alloy_wheels'] : 0,
                        "tinted_glass" => isset($input['tinted_glass']) ? $input['tinted_glass'] : 0,
                        "front_fog_lights" => isset($input['front_fog_lights']) ? $input['front_fog_lights'] : 0,
                        "rear_window_defogger" => isset($input['rear_window_defogger']) ? $input['rear_window_defogger'] : 0,
                        "manually_adjustable_exterior_rear_view_mirror" => isset($input['manually_adjustable_exterior_rear_view_mirror']) ? $input['manually_adjustable_exterior_rear_view_mirror'] : 0,
                        "electric_folding_rear_view_mirror" => isset($input['electric_folding_rear_view_mirror']) ? $input['electric_folding_rear_view_mirror'] : 0,
                        "rain_sensing_wipers" => isset($input['rain_sensing_wipers']) ? $input['rain_sensing_wipers'] : 0,
                    ]);
                }

                // update the images
                $car_images = $car->images;
        
                // // update the images
                if( isset($file['front_photo']) && !empty($file['front_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['front_photo']) && file_exists($path.$car_images['front_photo'])) {
                        unlink($path.$car_images['front_photo']);
                    }

                    $front_photo = 'car_front_image_'.uniqid().".".$file['front_photo']->getClientOriginalExtension();

                    $file['front_photo']->move( $path, $front_photo);
                    $car_images['front'] = $front_photo;
                }

                if( isset($file['left_photo']) && !empty($file['left_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['left_photo']) && file_exists($path.$car_images['left_photo'])) {
                        unlink($path.$car_images['left_photo']);
                    }

                    $left_photo = 'left_photo_'.uniqid().".".$file['left_photo']->getClientOriginalExtension();
    
                    $file['left_photo']->move( $path, $left_photo);
                    $car_images['left'] = $left_photo;
                }
    
                if( isset($file['right_photo']) && !empty($file['right_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['right_photo']) && file_exists($path.$car_images['right_photo'])) {
                        unlink($path.$car_images['right_photo']);
                    }

                    $right_photo = 'right_photo_'.uniqid().".".$file['right_photo']->getClientOriginalExtension();
    
                    $file['right_photo']->move( $path, $right_photo);
                    $car_images['right'] = $right_photo;
                }
    
                if( isset($file['rear_photo']) && !empty($file['rear_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['rear_photo']) && file_exists($path.$car_images['rear_photo'])) {
                        unlink($path.$car_images['rear_photo']);
                    }

                    $rear_photo = 'rear_photo_'.uniqid().".".$file['rear_photo']->getClientOriginalExtension();
    
                    $file['rear_photo']->move( $path, $rear_photo);
                    $car_images['rear'] = $rear_photo;
                }
    
                if( isset($file['interior_photo']) && !empty($file['interior_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['interior_photo']) && file_exists($path.$car_images['interior_photo'])) {
                        unlink($path.$car_images['interior_photo']);
                    }

                    $interior_photo = 'interior_photo_'.uniqid().".".$file['interior_photo']->getClientOriginalExtension();
    
                    $file['interior_photo']->move( $path, $interior_photo);
                    $car_images['interior_dashboard'] = $interior_photo;
                }
    
                if( isset($file['wheels_photo']) && !empty($file['wheels_photo']) ) {
                    // delete the old photo
                    if(!empty($car_images['wheels_photo']) && file_exists($path.$car_images['wheels_photo'])) {
                        unlink($path.$car_images['wheels_photo']);
                    }

                    $wheels_photo = 'wheels_photo_'.uniqid().".".$file['wheels_photo']->getClientOriginalExtension();
    
                    $file['wheels_photo']->move( $path, $wheels_photo);
                    $car_images['wheels'] = $wheels_photo;
                }

                $car_images->update();

                Session::flash('success','Car updated successfully');
                return back();
            }
        }
        
    }

    public function edit($car_id) {
        $data = $this->getFormDefaults();

        $car = Cars::where('car_id', $car_id)->first()->toArray();
        $other_attributes = OtherAttributes::where('cars_id', $car['id'])->first()->toArray();
        // $carImages = CarImages::where('cars_id', $car['id'])->first();

        $data['carDetails'] = array_merge($car,$other_attributes);
        return view('panel.cars.form', $data);
    }

    public function view($car_id) {
        $data = $this->getFormDefaults();
        $car = Cars::where('car_id', $car_id)->first()->toArray();
        $other_attributes = OtherAttributes::where('cars_id', $car['id'])->first()->toArray();

        $data['car'] = array_merge($car,$other_attributes);
        $data['images'] = CarImages::where('cars_id', $car['id'])->first();
        $data['image_path'] = url('/uploads/images/cars/'.$car['car_id'])."/";

        // dd($data);
        return view('panel.cars.view', $data);
    }

    protected function car_validations(array $data)
    {
        return Validator::make($data, [
            "brands_id" => 'required',
            "car_category_id" => 'required',
            "model" => 'required',
            "variant" => 'required',
            "year" => 'required',
            "kilometer" => 'required',
            "attribute_owner_type_id" => 'required',
            "condition" => 'required',
            "attribute_transmission_type_id" => 'required',
            "attribute_fuel_type_id" => 'required',
            "attribute_color_id" => 'required',
            "no_of_seats" => 'required',
            "tax" => 'required',
            "insurance" => 'required',
            "price" => 'required',
            "contact_number" => 'required',
            "state" => 'required',
            "city" => 'required',
            "rto" => 'required',
            "address" => 'required',
        ]);
    }

    private function getFormDefaults() {
        $data = [];

        /** Default values */
        $data['brands'] = Brands::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['categories'] = CarCategory::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['color'] = AttributeColor::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['fuel_type'] = AttributeFuelType::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['owner_type'] = AttributeOwnerType::where('status', 1)->pluck('name', 'id');
        $data['transmission_type'] = AttributeTransmissionType::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');

        $data['car_condition'] = [
            1 => "Good Condition",
            2 => "Mint Condition",
            3 => "Average Condition",
            4 => "Bad Condition",
        ];

        return $data;
    }
}
