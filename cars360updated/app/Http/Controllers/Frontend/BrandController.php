<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\BrandsServices;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function cars($slug) {
        $data = [];

        // get the category from slug
        $brand = BrandsServices::GetBrandBySlug($slug);

        if(empty($brand)) {
            return "404 not found";
        }
        
        // brand cars
        $data['cars'] = BrandsServices::GetBrandCarsBySlug($slug);

        // $data['category'] = $category;

        return view('frontend.car-category', $data);
    }
}
