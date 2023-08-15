@extends('frontend.layouts.app')

@section('title', 'Dealer')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$dealerData["name"]}}</h5>
            <p class="text-muted mb-4">{{$dealerData["city"]}}</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary mr-2">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
        <div class="col-lg-12 p-0">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$dealerData["name"]}}</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$dealerData["phone"]}}</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$dealerData["city"]}}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="row">
        @foreach($cars as $key => $car)
        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{ url($car['frontImage']) }}" alt="" />
              <div class="p_icon">
                <a href="/car-details/{{$car['carId']}}">
                  <i class="ti-eye"></i>
                </a>
              </div>
            </div>
            <div class="product-btm" style="background: white;">
              <a href="/car-details/{{$car['carId']}}" class="d-block">
                <h4>{{$car['brand']}}</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$ {{$car['price']}} </span>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        </div>
      </div>     
    </div>
  </div>
</section>
@endsection