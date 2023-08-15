@extends('frontend.layouts.app') @section('title', 'Car Details') @section('content')
<!--================Home Banner Area =================-->
<!-- <section class="banner_area"><div class="banner_inner d-flex align-items-center"><div class="container"><div
        class="banner_content d-md-flex justify-content-between align-items-center"
      ><div class="mb-3 mb-md-0"><h2>Product Details</h2><p>Very us move be blessed multiply night</p></div><div class="page_link"><a href="index.html">Home</a><a href="single-product.html">Product Details</a></div></div></div></div></section> -->
<!-- <div class="row"><form class="col-md-12" action=""><div class="row p-5"><div class="col-md-4"><label class="visually-hidden" for="specificSizeInputName">Name</label><input type="text" class="form-control" id="specificSizeInputName" placeholder="Name"></div><div class="col-md-4"><label class="visually-hidden" for="specificSizeInputName">Phone No.</label><input type="int" class="form-control" id="specificSizeInputName" placeholder="Phone No."></div><div class="col-md-4"><label class="visually-hidden" for="specificSizeInputGroupUsername">Email</label><div class="input-group"><div class="input-group-text">@</div><input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Email Id"></div></div></div></form></div>
<form ><div class="col-sm-3"></div><div class="col-sm-3"></div><div class="col-sm-3"><label class="visually-hidden" for="specificSizeSelect">Payment Method</label><select class="form-select" id="specificSizeSelect"><option selected>Choose...</option><option value="1">Cash</option><option value="2">Finance</option></select></div><p></p><div class="col-auto"><div class="form-check"><input class="form-check-input" type="checkbox" id="autoSizingCheck2"><label class="form-check-label" for="autoSizingCheck2">
        Remember me
      </label></div></div><p></p><div class="col-auto"><button type="submit" class="btn btn-primary">Book Your Appointment </button></div></form> -->
<!--================End Home Banner Area =================-->
<!--================Single Product Area =================-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
<div class="product_image_area pt-md-4">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="s_product_img">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators"> @if( !empty($carDetails['images']['front']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['front']) ) <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['front']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </li> @endif @if( !empty($carDetails['images']['rear']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['rear']) ) <li data-target="#carouselExampleIndicators" data-slide-to="1">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['rear']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} rear image' />
              </li> @endif @if( !empty($carDetails['images']['left']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['left']) ) <li data-target="#carouselExampleIndicators" data-slide-to="2">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['left']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} left image' />
              </li> @endif @if( !empty($carDetails['images']['right']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['right']) ) <li data-target="#carouselExampleIndicators" data-slide-to="3">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['right']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} right image' />
              </li> @endif @if( !empty($carDetails['images']['wheels']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['wheels']) ) <li data-target="#carouselExampleIndicators" data-slide-to="4">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['wheels']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} wheels image' />
              </li> @endif @if( !empty($carDetails['images']['interior_dashboard']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_dashboard']) ) <li data-target="#carouselExampleIndicators" data-slide-to="5">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_dashboard']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} interior dashboard image' />
              </li> @endif @if( !empty($carDetails['images']['interior_back']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_back']) ) <li data-target="#carouselExampleIndicators" data-slide-to="6">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_back']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} interior back image' />
              </li> @endif @if( !empty($carDetails['images']['top']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['top']) ) <li data-target="#carouselExampleIndicators" data-slide-to="7">
                <img class="card-img" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['top']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} top image' />
              </li> @endif </ol>
            <div class="carousel-inner custom-carousel-height"> @if( !empty($carDetails['images']['front']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['front']) ) <div class="carousel-item active">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['front']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['rear']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['rear']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['rear']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['left']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['left']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['left']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['right']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['right']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['right']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['wheels']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['wheels']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['wheels']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['interior_dashboard']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_dashboard']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_dashboard']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['interior_back']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_back']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['interior_back']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif @if( !empty($carDetails['images']['top']) && file_exists('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['top']) ) <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('uploads/images/cars/'.$carDetails->car_id.'/'.$carDetails['images']['top']) }}" alt='{{ $carDetails->model." ".$carDetails->variant }} image' />
              </div> @endif </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text mt-0">
          <h3>{{ $carDetails->brand_name." ".$carDetails->model." ".$carDetails->variant }}</h3>
          <h2>$ {{$carDetails['price']}}</h2>
          <div class="card_area my-2">
            <a class="icon_btn icon_btn_custom" href="#">
            <i class="fa-solid fa-gauge"></i>
            <p class="text-center">{{ $carDetails->kilometer }} KM</p>
            </a>
            <a class="icon_btn icon_btn_custom" href="#">
              <i class="fa-solid fa-gas-pump"></i>
              <p class="text-center">Fuel: {{$carDetails->fuel_type }}</p>
            </a>
            <a class="icon_btn icon_btn_custom" href="#">
            <i class="fa-solid fa-chair"></i>
              <p class="text-center">Seats : {{ $carDetails->no_of_seats }}</p>
            </a>
            <a class="icon_btn icon_btn_custom" href="#">
              <i class="fa-solid fa-car-on"></i>
              <p class="text-center">130 BHP</p>
            </a>
          </div>
          <div class="mb-2">
            <i class="fa-solid fa-user"></i>
            <a href="/dealer/{{ $carDetails->users_id }}" style="color: #71cd14; font-weight: 500" >Know about Dealer</a>
          </div>
          <ul class="list-group">
            <!-- <li class="list-group-item">Brand : {{ $carDetails->brand_name }}</li>
            <li class="list-group-item">Category : {{ $carDetails->model }}</li> -->
            <li class="list-group-item">Year : {{ $carDetails->year }}</li>
            <!-- <li class="list-group-item">Variant : {{ $carDetails->variant }}</li> -->
            <li class="list-group-item">Tax : {{ $carDetails->tax }}</li>
            <li class="list-group-item">Insurance : {{ $carDetails->insurance }}</li>
            <li class="list-group-item">Condition : {{ $carDetails->condition }}</li>
            <li class="list-group-item">Colour : {{ $carDetails->attribute_color_id }}</li>
            <li class="list-group-item">State : {{ $carDetails->state }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->
<!--================Product Description Area =================-->
<section class="product_description_area">
  <h3 class="text-center my-3">More Details</h3>
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="comfort-feature-tab" data-toggle="tab" href="#comfort-feature-panel" role="tab" aria-controls="comfort-feature-panel" aria-selected="true">Comfort feature</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="exterior-feature-tab" data-toggle="tab" href="#exterior-feature-panel" role="tab" aria-controls="exterior-feature-panel" aria-selected="true">Exterior feature</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="safety-feature-tab" data-toggle="tab" href="#safety-feature-panel" role="tab" aria-controls="safety-feature-panel" aria-selected="true">Safety feature</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <!-- Comfort feature starts -->
      <div class="tab-pane fade show active" id="comfort-feature-panel" role="tabpanel" aria-labelledby="comfort-feature-tab">
        <h3>Comfort feature</h3>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Music System </h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['music_system']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>A/C</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['ac']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Heater</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['heater']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Window</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_window']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Adjustable Steering</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['adjustable_steering']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Steering</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_steering']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Windows Front</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_windows_front']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Windows Rear</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_windows_rear']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Remote Fuel Lid Opener</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['remote_fuel_lid_opener']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Low Fuel Warning Light</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['low_fuel_warning_light']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Vanity Mirror</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['vanity_mirror']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Rear Seat Head Rest</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['rear_seat_head_rest']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Rear Seat Centre Arm Rest</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['rear_seat_center_arm_rest']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Cup Holder Front</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['cup_holder_front']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Cup Holder Rear</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['cup_holder_rear']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Comfort feature ends -->
      <!-- Safety feature starts -->
      <div class="tab-pane fade" id="safety-feature-panel" role="tabpanel" aria-labelledby="safety-feature-tab">
        <h3>Safety feature</h3>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Anti Lock Braking System</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['anti_lock_braking_system']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Door Locks</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_door_locks']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Child Safety Locks</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['child_safety_locks']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Anti Theft Alarm</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['anti_theft_alarm']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Driver Bags</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['driver_bags']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Immobilizer</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['immobilizer']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Passenger Air Bags</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['passenger_airbags']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Rear Seat Belt</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['rear_seat_belts']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Seat Belt Warning</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['seat_belt_warning']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Adjustable Seats</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['adjustable_seats']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Keyless Entry</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['keyless_entry']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Safety feature ends -->
      <!-- Exterior feature starts -->
      <div class="tab-pane fade" id="exterior-feature-panel" role="tabpanel" aria-labelledby="exterior-feature-tab">
        <h3>Exterior feature</h3>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Adjustable Head Lights</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['adjustable_head_lights']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Power Adjustable Exterior Rear View Mirror</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['power_adjustable_exterior_rear_view_mirror']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Alloy Wheels</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['alloy_wheels']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Tinted Glass</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['tinted_glass']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Manually Adjustable Exterior Rear View Mirror</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['manually_adjustable_exterior_rear_view_mirror']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Front Fog Lights</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['front_fog_lights']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Electric Folding Rear View Mirror</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['electric_folding_rear_view_mirror']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Rain Sensing Vipers</h5>
                </td>
                <td>
                  <h5>{{ !empty($other_attributes['rain_sensing_wipers']) ? 'Yes' : 'No' }}</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Exterior feature ends -->
      <!-- <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>Overall</h5>
                  <h4>4.0</h4>
                  <h6>(03 Reviews)</h6>
                </div>
              </div>
              <div class="col-6">
                <div class="rating_list">
                  <h3>Based on 3 Reviews</h3>
                  <ul class="list">
                    <li>
                      <a href="#">5 Star <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01 </a>
                    </li>
                    <li>
                      <a href="#">4 Star <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01 </a>
                    </li>
                    <li>
                      <a href="#">3 Star <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01 </a>
                    </li>
                    <li>
                      <a href="#">2 Star <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01 </a>
                    </li>
                    <li>
                      <a href="#">1 Star <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 01 </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="review_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('frontend/img/product/single-product/review-1.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('frontend/img/product/single-product/review-2.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('frontend/img/product/single-product/review-3.png') }}" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Add a Review</h4>
              <p>Your Rating:</p>
              <ul class="list">
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-star"></i>
                  </a>
                </li>
              </ul>
              <p>Outstanding</p>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
<section>
  <h3 class="text-center my-3 mb-5">Book a Call with us</h3>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-12">
        <form class="row contact_form" id="contactForm" novalidate="novalidate">
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input value="{{date('Y-m-d')}}" onfocus="(this.type='date')" class="form-control" id="date">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input value="10:00"  onfocus="(this.type='time')"  class="form-control" id="time" name="time">
            </div>
          </div>
          <div class="col-md-12 text-right mb-5 text-center mt-3">
            <button id="lead-submission" class="btn submit_btn"> Submit Now </button>
            <div class="mt-3" id="tq-note" style="display:none">
              <h2 style="color:green;">Thank you!</h2>
              <h3>Our executives will call you shortly :)</h3>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<style>
  .icon_btn{
    min-width: 75px;
  }
</style>
<script>
  var _POST = { //post data to be sent to server
    mailId:'',
    name:'',
    phone: '',
    queries: '',
  };

  window.onload = (event) => {
    $("#contactForm").submit(function(){
      _POST['mailId']=$("#email").val();
      _POST['name']=$("#name").val();
      _POST['phone']=$("#number").val();
      _POST['_token']='{{csrf_token()}}';
      _POST['userId']='{{ $carDetails->users_id }}'; // id of dealer
      _POST['carId']={{$carId}};
      _POST['appointmentTime']=$("#date").val()+" "+$("#time").val();
      $.ajax({
        type: "POST",
        url: '/car-lead',
        data: _POST,
        success: function (data) {
          console.log(data);
          $("#tq-note").show();
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
        },
      })
      return false;
    })
  };
  
</script>
<!--================End Product Description Area =================--> @endsection