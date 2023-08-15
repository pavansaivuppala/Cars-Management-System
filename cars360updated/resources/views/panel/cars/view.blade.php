@extends('layouts.main')

@section('title', 'View Car | CarDrive365')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="col-12">
                @if(!empty($images['front']))
                  <img class="product-image" src="{{ $image_path.$images['front'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}">
                @else
                  <img src="{{ url('/img/default-car.png') }}" class="product-image" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}">
                @endif
              </div>

              <div class="col-12 product-image-thumbs">
                @if(!empty($images['front']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['front'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb active" data-src="{{ $image_path.$images['front'] }}"><img src="{{ $image_path.$images['front'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb active" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif

                @if(!empty($images['rear']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['rear'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb" data-src="{{ $image_path.$images['rear'] }}"><img src="{{ $image_path.$images['rear'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif

                @if(!empty($images['left']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['left'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb" data-src="{{ $image_path.$images['left'] }}"><img src="{{ $image_path.$images['left'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif

                @if(!empty($images['right']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['right'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb" data-src="{{ $image_path.$images['right'] }}"><img src="{{ $image_path.$images['right'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif

                @if(!empty($images['wheels']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['wheels'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb" data-src="{{ $image_path.$images['wheels'] }}"><img src="{{ $image_path.$images['wheels'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif

                @if(!empty($images['interior']))
                  <!-- <img class="img-fluid" src="{{ $image_path.$images['interior'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"> -->
                  <div class="product-image-thumb" data-src="{{ $image_path.$images['interior'] }}"><img src="{{ $image_path.$images['interior'] }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @else
                  <div class="product-image-thumb" data-src="{{ url('/img/default-car.png') }}"><img src="{{ url('/img/default-car.png') }}" alt="{{ $brands[$car['brands_id']].' '.$car['model'] }}"></div>
                @endif
              </div>  
              <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{ $brands[$car['brands_id']]." ".$car['model'] }}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Year</b> <a class="float-right">{{ $car['year'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>KM</b> <a class="float-right">{{ $car['kilometer'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{ $car['price'] }}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>View Page</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Analytics Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-chart-line"></i> Views: 233</strong>
                <br>
                <hr>
                <strong><i class="fas fa-address-book"></i> Leads: 36</strong>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
               
               
                  <div class="row">
                    <div class="col-md-12">
                      <a  class="btn btn-outline-success edit-car-details" href="{{ route('car_edit', [$car['car_id']]) }}">Edit</a>
                      <h2 class="details-title">Car Details</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Brand</div>
                        <div class="details-value">{{ $brands[$car['brands_id']] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Category</div>
                        <div class="details-value">{{ $categories[$car['car_category_id']] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Model</div>
                        <div class="details-value">{{ $car['model'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Variant</div>
                        <div class="details-value">{{ $car['variant'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Year</div>
                        <div class="details-value">{{ $car['year'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Kilometer</div>
                        <div class="details-value">{{ $car['kilometer'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">No.of Owner</div>
                        <div class="details-value">{{ $car['no_of_seats'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Condition</div>
                        <div class="details-value">{{$car_condition[$car['condition']] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Transmission Type</div>
                        <div class="details-value">{{$transmission_type[$car['attribute_transmission_type_id']] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Fuel Type</div>
                        <div class="details-value">{{ $fuel_type[$car['attribute_fuel_type_id']] }}</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Car Color</div>
                        <div class="details-value">{{ $color[$car['attribute_color_id']] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">No.of Seats</div>
                        <div class="details-value">{{ $car['no_of_seats'] }}</div>
                      
                      </div>
                      <div class="details-item">
                        <div class="details-header">Tax</div>
                        <div class="details-value">{{ $car['tax'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Insurance</div>
                        <div class="details-value">{{ $car['insurance'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Price</div>
                        <div class="details-value">{{ $car['price'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Phone No.</div>
                        <div class="details-value">{{ $car['contact_number'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">State</div>
                        <div class="details-value">{{ $car['state'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">City</div>
                        <div class="details-value">{{ $car['city'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">RTO Registration</div>
                        <div class="details-value">{{ $car['rto'] }}</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Address</div>
                        <div class="details-value">{{ $car['address'] }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="details-title">Comfort Features</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Music System</div>
                        <div class="details-value">
                          @if(isset($car['music_system']) && $car['music_system'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif
                        </div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">A/C</div>
                        <div class="details-value">@if($car['ac'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Heater</div>
                        <div class="details-value">@if($car['heater'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Air Bags</div>
                        <div class="details-value">@if($car['air_bags'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Window</div>
                        <div class="details-value">@if($car['power_window'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Adjustable Steering</div>
                        <div class="details-value">@if($car['adjustable_steering'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Steering</div>
                        <div class="details-value">@if($car['power_steering'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Windows Front</div>
                        <div class="details-value">@if($car['power_windows_front'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Windows Rear</div>
                        <div class="details-value"> 
                        @if($car['power_windows_rear'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Remote Fuel Lid Opener</div>
                        <div class="details-value">@if($car['remote_fuel_lid_opener'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Low Fuel Warning Light</div>
                        <div class="details-value">
                          @if($car['low_fuel_warning_light'])
                            Yes
                          @else
                            No
                          @endif
                        </div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Vanity Mirror</div>
                        <div class="details-value">@if($car['vanity_mirror'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Rear Seat Head Rest</div>
                        <div class="details-value">@if($car['rear_seat_head_rest'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Rear Seat Centre Arm Rest</div>
                        <div class="details-value">@if(isset($car['rear_seat_center_arm_rest']) && $car['rear_seat_center_arm_rest'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Cup Holder Front</div>
                        <div class="details-value">@if($car['cup_holder_front'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Cup Holder Rear</div>
                        <div class="details-value">@if($car['cup_holder_rear'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="details-title">Car Safety Features</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Anti Lock Braking System</div>
                        <div class="details-value">@if($car['anti_lock_braking_system'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Door Locks</div>
                        <div class="details-value">@if($car['power_door_locks'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Child Safety Locks</div>
                        <div class="details-value">@if($car['child_safety_locks'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Anti Theft Alarm</div>
                        <div class="details-value">@if($car['anti_theft_alarm'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Driver Bags</div>
                        <div class="details-value">@if($car['driver_airbags'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Immobilizer</div>
                        <div class="details-value">@if($car['immobilizer'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Passenger Airbags</div>
                        <div class="details-value">@if($car['passenger_airbags'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Rear Seat Belt</div>
                        <div class="details-value">@if($car['rear_seat_belts'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Seat Belt Warning</div>
                        
                        <div class="details-value">@if($car['seat_belt_warning'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Adjustable Seats</div>
                        <div class="details-value">@if($car['adjustable_seats'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Keyless Entry</div>
                        <div class="details-value">@if($car['keyless_entry'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="details-title">Car Exterior Features</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Adjustable Head Lights</div>
                        <div class="details-value">@if(isset($car['adjustable_head_lights']) && $car['adjustable_head_lights'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Power Adjustable Exterior Rear View Mirror</div>
                        <div class="details-value">@if($car['power_adjustable_exterior_rear_view_mirror'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Alloy Wheels</div>
                        <div class="details-value">@if($car['alloy_wheels'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Tinted Glass</div>
                        <div class="details-value">@if($car['tinted_glass'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Manually Adjustable Exterior Rear View Mirror</div>
                        <div class="details-value">@if($car['manually_adjustable_exterior_rear_view_mirror'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="details-item">
                        <div class="details-header">Front Fog Lights</div>
                        <div class="details-value">@if($car['front_fog_lights'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Rear Window Defogger</div>
                        <div class="details-value">@if($car['rear_window_defogger'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      
                      <div class="details-item">
                        <div class="details-header">Electric Folding Rear View Mirror</div>
                        <div class="details-value">@if($car['electric_folding_rear_view_mirror'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      <div class="details-item">
                        <div class="details-header">Rain Sensing Vipers</div>
                        <div class="details-value">@if($car['rain_sensing_wipers'])
                            <strong>Yes</strong>
                          @else
                            No
                          @endif</div>
                      </div>
                      
                      
                     
                      
                      
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('footer-js')
<script>
  $('.product-image-thumb').click(function() {
    $('.product-image').attr('src', $(this).attr('data-src'));
  });
</script>
@endsection