@extends('layouts.main') @section('title', 'My Cars | CarDrive365') @section('content')
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row pt-3">
      <div class="col-10">
        <div class="row">
          <div class="col-3 form-group">
            <select class="show form-control" id="cityFilter">
              <option selected>City</option>
              <option value="Kolkata">Kolkata</option>
              <option value="Mumbai">Mumbai</option>
              <option value="Pune">Pune</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Chennai">Chennai </options>
              <option value="Ranchi">Ranchi </options>
              <option value="Kochi">Kochi </options>
              <option value="Surat">Surat </options>
              <option value="Patna">Patna </options>
              <option value="Hyderabad">Hyderabad </options>
            </select>
          </div>
          <div class="col-3 form-group">
            <select class="show form-control" id="stateFilter">
              <option value="State">State</option>
              <option value="West Bengal">West Bengal</option>
              <option value="Maharastra">Maharastra</option>
              <option value="Kerala">Kerala </options>
              <option value="Punjab">Punjab </options>
              <option value="Tamil Nadu">Tamil Nadu </options>
              <option value="Rajasthan">Rajasthan </options>
              <option value="Haryana">Haryana </options>
              <option value="Jharkhand">Jharkhand </options>
              <option value="Assam">Assam </options>
              <option value="Uttar Pradesh">Uttar Pradesh </options>
              <option value="Madhya Pradesh">Madhya Pradesh </options>
              <option value="Gujrat">Gujrat </options>
              <option value="Telangana">Telangana </options>
              <option value="Chattishgarh">Chattishgarh </options>
              <option value="Andra Pradesh">Andra Pradesh </options>
              <option value="Tripura">Tripura </options>
              <option value="Goa">Goa </options>
              <option value="Orissa">Orissa </options>
              <option value="Others">Others </options>
            </select>
          </div>
          <div class="col-3 form-group">
            {{ Form::select('Fuel Type', $fuel_type, $fuel_type, [ "class" => "form-control", "placeholder" => "Fuel Type", "id"=>"fuelFilter" ]) }}
          </div>
          <div class="col-3 form-group">
            <select class="show form-control" id="yearFilter">
              <option value="Year">Year</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018 </options>
              <option value="2017">2017 </options>
              <option value="2016">2016 </options>
              <option value="2015">2015 </options>
              <option value="2014">2014 </options>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3 form-group">
            {{ Form::select('Car Condition', $car_condition, $car_condition, [ "class" => "form-control", "placeholder" => "Car Condition", "id"=>"carConditionFilter" ]) }}
          </div>
          <div class="col-3 form-group">
          {{ Form::select('Owner Type', $owner_type, $owner_type, [ "class" => "form-control", "placeholder" => "Owner Type", "id"=>"ownerTypeFilter" ]) }}

          </div>
          <div class="col-3 form-group">
            {{ Form::select('Category', $categories, $categories, [ "class" => "form-control", "placeholder" => "Category", "id"=>"categoryFilter" ]) }}
          </div>
          <div class="col-3 form-group">
            {{ Form::select('Brands', $brands, $brands, [ "class" => "form-control", "placeholder" => "Brand", "id"=>"brandFilter" ]) }}
          </div>
        </div>
      </div>
      <div class="col-2 form-group">
        <Button id="applyFiltersBtn" class="btn btn-primary">Apply Filter</Button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">My cars</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Variant</th>
                    <th>Year</th>
                    <th>City</th>
                    <th>KM</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th style="width:130px;"></th>
                  </tr>
                </thead>
                <tbody id="tbody"> @foreach($cars as $car) <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->variant }}</td>
                    <td>{{ $car->year }}</td>
                    <td class="carCity">{{ $car->city }}</td>
                    <td>{{ $car->kilometer }}</td>
                    <!-- <td></td> -->
                    <td>{{ $car->price }}</td>
                    <td>
                      {{ Form::select('status', $statuses, $car->status, [ "class" => "form-control", "placeholder" => "Status" ]) }}
                    </td>
                    <td>
                      <a class="table-action-btn-view" href="{{ route('car_view', [$car->car_id]) }}">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('car_edit', [$car->car_id]) }}" class="table-action-btn-view"">
												<i class=" fas fa-edit"></i>
                      </a>
                      <a class="table-action-btn-delete">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr> @endforeach </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <script>
    window.onload = (event) => {
      $(function() {
        var _POST = {} //post data to be sent to server
        var tableData = {}
        $("#applyFiltersBtn").on('click', function() {
          readValues();
          var data = {}
          data['_token'] = '{{csrf_token()}}';
          data['details'] = _POST;
          console.log('post', data)
          var start = new Date();

          $.ajax({
            type: "POST",
            url: '/panel/cars/filter',
            data: data,
            success: function(data) {
              tableData = JSON.parse(data);
              console.log("done", tableData);
              refreshTable();
              var elapsed = new Date() - start;
              console.log("time taken",elapsed)
            },
            error: function(data, textStatus, errorThrown) {
              console.log(data);
            },
          })
        })
        //Read Filters and populate the post
        function readValues() {
          _POST = {}
          var city = $("#cityFilter").val() != "City" ? _POST['city'] = $("#cityFilter").val() : console.log("No city")
          var state = $("#stateFilter").val() != "State" ? _POST['state'] = $("#stateFilter").val() : console.log("No state")
          var year = $("#yearFilter").val() != "Year" ? _POST['year'] = $("#yearFilter").val() : console.log("No Year")
          var carCondition = $("#carConditionFilter").val() != "" ? _POST['condition'] = $("#carConditionFilter").val() : console.log("No Car Contion")
          var year = $("#fuelFilter").val() != "" ? _POST['attribute_fuel_type_id'] = $("#fuelFilter").val() : console.log("No Fuel")
          var ownerType = $("#ownerTypeFilter").val() != "" ? _POST['attribute_owner_type_id'] = $("#ownerTypeFilter").val() : console.log("No Owner Type")
          var ownerType = $("#brandFilter").val() != "" ? _POST['brands_id'] = $("#brandFilter").val() : console.log("No Brand")

        }
        // Refresh table with new data
        function refreshTable() {
          $("tbody").html("")
          var table = document.getElementById("tbody");
          var index = 1;
          for (key in tableData) {
            let row = table.insertRow(-1);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);
            let cell5 = row.insertCell(4);
            let cell6 = row.insertCell(5);
            let cell7 = row.insertCell(6);
            let cell8 = row.insertCell(7);
            let cell9 = row.insertCell(8);
            let cell10 = row.insertCell(9);
            cell1.innerHTML = index;
            cell2.innerHTML = tableData[key]['brands_id'];
            cell3.innerHTML = tableData[key]['model'];
            cell4.innerHTML = tableData[key]['variant'];
            cell5.innerHTML = tableData[key]['year'];
            cell6.innerHTML = tableData[key]['city'];
            cell7.innerHTML = tableData[key]['kilometer'];
            cell8.innerHTML = tableData[key]['created_at'];
            cell9.innerHTML = tableData[key]['price'];
            cell10.innerHTML = tableData[key]['status'];
            index++;
          }
        }
      })
    }
  </script> @endsection