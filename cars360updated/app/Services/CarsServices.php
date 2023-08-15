<?php
namespace App\Services;

use App\Models\Car\Brands;
use App\Models\Car\CarImages;
use App\Models\Car\Cars;

class CarsServices
{
    public static $detaultCarImage = 'img/default-car.png';

    /**
     * Get car details using id
     * This will return the complete details about a cars
     * 
     * @param int carId
     * @return Cars 
     */
    public static function CarDetails($carId) {
        $car = Cars::find($carId);

        // get the image details for the cars
        $images = CarImages::where('cars_id', $carId)->first();

        if(!empty($images)) {
            $car->images = [
                'front' => !empty($images->front) ? $images->front: self::$detaultCarImage,
                'rear' => $images->rear,
                'left' => $images->left,
                'right' => $images->right,
                'top' => $images->top,
                'wheels' => $images->wheels,
                'interior_dashboard' => $images->interior_dashboard,
                'interior_back' => $images->interior_back,
            ];
        }

        // get the brand details
        $brand = Brands::find($car->brands_id);

        if(!empty($brand)) {
            $car->brand_name = $brand->name;
        }

        return $car;
    }
}