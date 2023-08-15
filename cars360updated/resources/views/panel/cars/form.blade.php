@extends('layouts.main')

@section('title')
   @if(empty($carDetails))
      Add Cars | CarDrive365
   @else
      Edit Car | CarDrive365
   @endif
@endsection

@section('content')
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary mt-3">
               <div class="card-header">
                  @if(empty($carDetails))
                     <h3 class="card-title">Add your car</h3>
                  @else
                     <h3 class="card-title">Edit your car</h3>
                  @endif
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               @if(empty($carDetails))
                  <form role="form" action="{{ route('car_create') }}" method="POST" enctype='multipart/form-data'>
                  @csrf
               @else
                  {{ Form::model($carDetails, [ 'route' => 'car_update' , 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                  {{ Form::hidden('car_id') }}
               @endif
                  <div class="card-body">
                     <div id="accordion">
                        <div class="card">
                           <div class="card-header card-grey">
                              <h4 class="card-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#generalInfoCollapse">
                                 General Information
                                 </a>
                              </h4>
                           </div>
                           <div id="generalInfoCollapse" class="panel-collapse in collapse show">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label >Brand<span class="required">*</span></label>
                                          {{ Form::select('brands_id', $brands, null, [ "class" => "form-control", "placeholder" => "Select Car Brand" ]) }}
                                          @if($errors->has('brands_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>Car brand is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Category<span class="required">*</span></label>
                                          {{ Form::select('car_category_id', $categories, null, [ "class" => "form-control", "placeholder" => "Select Car Category" ]) }}
                                          @if($errors->has('car_category_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>Car category id field is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Model<span class="required">*</span></label>
                                          {{ Form::text('model', null, [ "class" => 'form-control', 'placeholder' => 'Model' ] ) }}
                                          @if($errors->has('model'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('model') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Variant<span class="required">*</span></label>
                                          {{ Form::text('variant', null, [ "class" => 'form-control', 'placeholder' => 'Enter Variant' ] ) }}
                                          @if($errors->has('variant'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('variant') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Year<span class="required">*</span></label>
                                          {{ Form::text('year', null, [ "class" => 'form-control', 'placeholder' => 'Enter Year' ] ) }}
                                          @if($errors->has('year'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('year') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Kilometers<span class="required">*</span></label>
                                          {{ Form::text('kilometer', null, [ "class" => 'form-control', 'placeholder' => 'Enter KM' ] ) }}
                                          @if($errors->has('kilometer'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('kilometer') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label>No.of Owner<span class="required">*</span></label>
                                          {{ Form::select('attribute_owner_type_id', $owner_type, null, [ "class" => "form-control", "placeholder" => "Select Car Owner Type" ]) }}
                                          @if($errors->has('attribute_owner_type_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>The owner type is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label>Condition<span class="required">*</span></label>
                                          {{ Form::select('condition', $car_condition, null, [ "class" => "form-control", "placeholder" => "Select Car Condition" ]) }}
                                          @if($errors->has('condition'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('condition') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label>Transmission Type<span class="required">*</span></label>
                                          {{ Form::select('attribute_transmission_type_id', $transmission_type, null, [ "class" => "form-control", "placeholder" => "Select Car Transmission" ]) }}
                                          @if($errors->has('attribute_transmission_type_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>The transmission type is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label>Fuel Type<span class="required">*</span></label>
                                          {{ Form::select('attribute_fuel_type_id', $fuel_type, null, [ "class" => "form-control", "placeholder" => "Select Car Fuel" ]) }}
                                          @if($errors->has('attribute_fuel_type_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>The fuel type is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Car Color<span class="required">*</span></label>
                                          {{ Form::select('attribute_color_id', $color, null, [ "class" => "form-control", "placeholder" => "Select Car Color" ]) }}
                                          @if($errors->has('attribute_color_id'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>The attribute color is required.</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >No.of Seats<span class="required">*</span></label>
                                          {{ Form::text('no_of_seats', null, [ "class" => 'form-control', 'placeholder' => 'No. of Seats' ] ) }}              
                                          @if($errors->has('no_of_seats'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('no_of_seats') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Tax<span class="required">*</span></label>
                                          {{ Form::text('tax', null, [ "class" => 'form-control', 'placeholder' => 'Enter Tax' ] ) }}
                                          @if($errors->has('tax'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('tax') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Insurance<span class="required">*</span></label>
                                          {{ Form::text('insurance', null, [ "class" => 'form-control', 'placeholder' => 'Insurance valid till' ] ) }}
                                          @if($errors->has('insurance'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('insurance') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Price<span class="required">*</span></label>
                                          {{ Form::text('price', null, [ "class" => 'form-control', 'placeholder' => 'Enter price' ] ) }}
                                          @if($errors->has('price'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Phone No.<span class="required">*</span></label>
                                          {{ Form::text('contact_number', null, [ "class" => 'form-control', 'placeholder' => 'Enter contact number' ] ) }}
                                          @if($errors->has('contact_number'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('contact_number') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >State<span class="required">*</span></label>
                                          {{ Form::text('state', null, [ "class" => 'form-control', 'placeholder' => 'Enter state' ] ) }}
                                          @if($errors->has('state'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('state') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >City<span class="required">*</span></label>
                                          {{ Form::text('city', null, [ "class" => 'form-control', 'placeholder' => 'Enter city' ] ) }}
                                          @if($errors->has('city'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >RTO Registration<span class="required">*</span></label>
                                          {{ Form::text('rto', null, [ "class" => 'form-control', 'placeholder' => 'RTO Registration' ] ) }}
                                          @if($errors->has('rto'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('rto') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                       <div class="form-group">
                                          <label >Address<span class="required">*</span></label>
                                          {{ Form::text('address', null, [ "class" => 'form-control', 'placeholder' => 'Enter address' ] ) }}
                                          @if($errors->has('address'))
                                             <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                             </span>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- ./card body -->
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header card-grey">
                              <h4 class="card-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseImages">
                                 Images
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseImages" class="panel-collapse in collapse show">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Front photo</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="front_photo" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Left Photo</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="left_photo" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Right Photo</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="right_photo" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Rear Photo</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="rear_photo"  class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Interiors</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="interior_photo" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Wheels</label>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" name="wheels_photo" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header card-grey">
                              <h4 class="card-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFeatures">
                                 Features and specifications
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseFeatures" class="panel-collapse in collapse show">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-4">
                                    <h4 style="font-weight:bold">COMFORT FEATURES</h4>
                                    <div class="form-check" style="font-weight:bold">
                                      {{ Form::checkbox('music_system', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Music System</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                      {{ Form::checkbox('ac', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">AC</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('heater', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Heater</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('air_bags', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Air Bags</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                      {{ Form::checkbox('power_window', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Window</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('adjustable_steering', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Adjustable Steering</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('power_steering', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Steering</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('power_windows_front', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Windows Front</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('power_windows_rear', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Windows Rear</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('remote_fuel_lid_opener', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Remote Fuel Lid Opener</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('low_fuel_warning_light', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Low Fuel Warning Light</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('vanity_mirror', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Vanity Mirror</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('rear_seat_head_rest', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Rear Seat Head Rest</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('rear_seat_center_arm_rest', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Rear Seat Center Arm Rest</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('cup_holder_front', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Cup Holder Front</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('cup_holder_rear', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Cup Holder Rear</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <h4 style="font-weight:bold">CAR SAFETY FEATURES</h4>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('anti_lock_braking_system', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Anti Lock Braking System</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('power_door_locks', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Door Locks</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('child_safety_locks', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Child Safety Locks</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('anti_theft_alarm', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Anti Theft Alarm</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('driver_airbags', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Driver Bags</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('passenger_airbags', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Passenger Airbags</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('rear_seat_belts', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Rear Seat Belt</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('seat_belt_warning', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Seat Belt Warning</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('adjustable_seats', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Adjustable Seats</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('keyless_entry', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Keyless Entry</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('immobilizer', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Immobilizer</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <h4 style="font-weight:bold">CAR EXTERIOR FEATURES</h4>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('adjustable_head_lights', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Adjustable Head Lights</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('power_adjustable_exterior_rear_view_mirror', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Power Adjustable Exterior Rear View Mirror</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('alloy_wheels', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Alloy Wheels</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('tinted_glass', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Tinted Glass</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('front_fog_lights', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Front Fog Lights</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('rear_window_defogger', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Rear Window Defogger</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('manually_adjustable_exterior_rear_view_mirror', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Manually Adjustable Exterior Rear View Mirror</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('electric_folding_rear_view_mirror', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Electric Folding Rear View Mirror</label>
                                    </div>
                                    <div class="form-check" style="font-weight:bold">
                                    {{ Form::checkbox('rain_sensing_wipers', true, null, [ 'class' => 'form-check-input' ]) }}
                                      <label class="form-check-label">Rain Sensing Vipers</label>
                                    </div>
                                  </div>
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-outline-primary btn-flat float-right">Save</button>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
@endsection