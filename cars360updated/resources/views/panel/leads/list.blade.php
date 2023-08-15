@extends('layouts.main') @section('title', 'Leads | CarDrive365') @section('content')
<!-- Main content --> <?php 
$index=1;
?> <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Add lead Form -->
        <div class="card-body px-0">
          <h4 class="ml-2">Add New Lead</h4>
                <div class="col-md-12 col-12">
                  <form class="row" id="contactForm" novalidate="novalidate">
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input value="{{date('Y-m-d')}}" onfocus="(this.type='date')" class="form-control" id="date">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input value="10:00" onfocus="(this.type='time')" class="form-control" id="time" name="time">
                      </div>
                    </div>
                    <div class="col-md-2 text-right text-center">
                      <button id="lead-submission" class="btn btn-primary"> Submit Now </button>
                      <div class="mt-3" id="tq-note" style="display:none">
                        <h4 style="color:green;">Done</h4>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
       
        <!-- Filters -->
        <!-- <h4 class="ml-2">Filters</h4> -->
        <div class="row mt-2">
          
          <div class="col-3">
            <div class="">
              <!-- <label for="">Date</label> -->
              <input id="dateFilterInp" value="{{date('Y-m-d')}}" onfocus="(this.type='date')" class="form-control" id="date">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <select class="form-control" id="statusFilter">
                <option value="6">Select Car Condition</option>
                <option value="1">New</option>
                <option value="2">Interested</option>
                <option value="3">Spam</option>
                <option value="4">Called</option>
                <option value="5">Call Later</option>
                <option value="5">Sold</option>
              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              {{ Form::select('brands_id', $brands, null, [ "class" => "form-control", "placeholder" => "Select Car Brand", "id"=> "carBrandFilter" ]) }}
            </div>
          </div>
          <div class="col-3">
          <button class="btn btn-primary ml-2" id="dateFilter">Search</button>


          </div>
        </div>
        <div class="form-row mt-2">
          <!-- Status Filter -->
               <!-- Car Filter -->
          
        </div>
        <!-- general form elements -->
        <div class="card card-primary mt-3">
          <div class="card-header">
            <h3 class="card-title">Leads</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width:40px;">Sl.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Brand</th>
                  <!-- <th>Status</th> -->
                  <th style="width:50px;">Status</th>
                </tr>
              </thead>
              <tbody> @foreach($leads as $key => $lead) <tr>
                  <td>{{$index}}</td> <?php $index++ ?> <td>{{$lead['name']}}
                  </td>
                  <td>{{$lead['email']}}</td>
                  <td> {{$lead['phone']}}</td>
                  <td>{{$lead['date']}}</td>
                  <td data-cars-id="{{$lead['brand']}}" class="carsId">{{$brands[$lead['brand']]}}</td>
                  <td>
                    <select>
                      <option value="1" @if($lead['status']=="1" ) selected @endif>New</option>
                      <option value="2">Interested</option>
                      <option value="3">Spam</option>
                      <option value="4">Called</option>
                      <option value="5">Call Later</option>
                      <option value="5">Sold</option>
                    </select>
                  </td>
                  <td>
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
  var _POST = { //post data to be sent to server
    mailId: '',
    name: '',
    phone: '',
    queries: '',
  };
  window.onload = (event) => {
    $(function() {
      // Car Filter
      $("#carBrandFilter").change(function() {
        $("#table tbody tr").each(function() {
          Val = $(this).find("td.carsId").attr("data-cars-id");
          $(this).hide();
          if (Val == $("#carBrandFilter").val() || $("#carBrandFilter").val() == '') {
            $(this).show()
          }
        })
      })
      // Status Filter
      $("#statusFilter").change(function() {
        $("#table tbody tr").each(function() {
          statusVal = $(this).find("select").val()
          $(this).hide()
          if (statusVal == $("#statusFilter").val() || $("#statusFilter").val() == 6) {
            $(this).show()
          }
        })
      })
      // Date Filter
      $("#dateFilter").on('click', function() {
        const parser = new URL(url || window.location);
        parser.searchParams.set('date', $("#dateFilterInp").val());
        window.location = parser.href;
      })
      // Add new Lead
      $("#contactForm").submit(function() {
        _POST['mailId'] = $("#email").val();
        _POST['name'] = $("#name").val();
        _POST['phone'] = $("#number").val();
        _POST['_token'] = '{{csrf_token()}}';
        _POST['userId'] = '{{  Auth::user()->id }}'; // id of dealer
        _POST['carId'] = 1;
        _POST['appointmentTime'] = $("#date").val() + " " + $("#time").val();
        $.ajax({
          type: "POST",
          url: '/car-lead',
          data: _POST,
          success: function(data) {
            console.log(data);
            $("#tq-note").show();
          },
          error: function(data, textStatus, errorThrown) {
            console.log(data);
          },
        })
        return false;
      })
    })
  };
</script> @endsection