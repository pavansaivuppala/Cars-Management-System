<?php

namespace App\Services\Frontend;

use App\Models\Car\CarCategory;
use App\Services\CarsServices;
class CarCategoryServices
{
    // get all the Brand data
    public static function GetCategories() {
        $category = CarCategory::get();
        
        return $category;
    }

    public static function GetCategoryDetailsBySlug($slug) {
        return CarCategory::where('slug', $slug)->first();
    }

    public static function CategoryCarsBySlug($slug) {
        $category = CarCategory::where('slug', $slug)->first();

        if(empty($category)) {
            return null;
        }
        else {
            $cars = $category->cars;
            $data = [];

            foreach($cars as $car) {
                $data[] = CarsServices::CarDetails($car->id);
            }

            return $data;
        }
    }
}
