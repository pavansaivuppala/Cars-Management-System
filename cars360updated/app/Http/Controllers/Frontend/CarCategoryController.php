<?php

namespace App\Http\Controllers\Frontend;

use CarCategoryServices;
use App\Http\Controllers\Controller;
class CarCategoryController extends Controller
{
    public function category($slug) {
        $data = [];

        // get the category from slug
        $category = CarCategoryServices::GetCategoryDetailsBySlug($slug);

        if(empty($category)) {
            return "404 not found";
        }
        
        // category cars
        $data['cars'] = CarCategoryServices::CategoryCarsBySlug($slug);

        $data['category'] = $category;

        return view('frontend.car-category', $data);
    }
}
