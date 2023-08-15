<?php

namespace App\Services\Frontend;

use App\Models\Car\Brands;
use App\Models\Car\Cars;
use App\Services\CarsServices;

class BrandsServices
{
    // get all the Brand data
    public static function GetBrands() {
        $brands = Brands::get();
        
        return $brands;
    }

    public static function GetBrandBySlug($slug) {
        return Brands::where('slug', $slug)->first();
    }

    public static function GetBrandCarsBySlug($slug) {
        $brand = self::GetBrandBySlug($slug);

        if(empty($brand)) {
            return null;
        }
        else {
            $cars = $brand->cars;
            $data = [];

            foreach($cars as $car) {
                $data[] = CarsServices::CarDetails($car->id);
            }

            return $data;
        }
    }
}
