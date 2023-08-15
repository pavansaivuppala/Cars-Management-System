@extends('frontend.layouts.app')
@section('title', 'Category')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
   <div class="banner_inner d-flex align-items-center">
      <div class="container">
         <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
               <h2>{{ $category->name ?? 'Car Category' }}</h2>
               <p>{{ $category->description ?? 'All in one solution for car owners' }}</p>
            </div>
            <div class="page_link">
               <a href="index.html">Home</a>
               <a href="category.html">Collections</a>
               <a href="category.html">{{ $category->name ?? 'Car Category' }}</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Category Product Area =================-->
<section class="cat_product_area mt-3">
   <div class="container">
      <div class="row flex-row-reverse">
         <div class="col-lg-9">
            <div class="product_top_bar">
               <div class="left_dorp">
                  <select class="show">
                     <option value="1">State</option>
                     <option value="2">West Bengal</option>
                     <option value="3">Maharastra</option>
                     <option value="4" >Kerala</options>
                     <option value="5" >Punjab</options>
                     <option value="6" >Tamil Nadu</options>
                     <option value="7" >Rajasthan</options>
                     <option value="8" >Haryana</options>
                     <option value="9" >Jharkhand</options>
                     <option value="10" >Assam</options>
                     <option value="11" >Uttar Pradesh</options>
                     <option value="12" >Madhya Pradesh</options>
                     <option value="13" >Gujrat</options>
                     <option value="14" >Telagana</options>
                     <option value="15" >Chattishgarh</options>
                     <option value="16" >Andrapradesh</options>
                     <option value="17" >Tripura</options>
                     <option value="18" >Goa</options>
                     <option value="19" >Orissa</options>
                     <option value="" >Others</options>
                  </select>
                  <select class="show">
                     <option value="1">City</option>
                     <option value="2">Kolkata</option>
                     <option value="3">Mumbai</option>
                     <option value="4">Pune</option>
                     <option value="5">Bangalore</option>
                     <option value="6" >Chennai</options>
                     <option value="7" >Ranchi</options>
                     <option value="8" >Ranchi</options>
                     <option value="9" >Kochi</options>
                     <option value="10" >Surat</options>
                     <option value="11" >Patna</options>
                  </select>
                  <select class="show">
                     <option value="1" >Fuel Type</options>
                     <option value="2" >Petrol</options>
                     <option value="3" >Diesel</options>
                     <option value="4" >Others</options>
                  </select>
                  <select class="show">
                     <option value="1" >Price</options>
                     <option value="2" >Low to High</options>
                     <option value="3" >High to Low</options>
                  </select>
                  <select class="show">
                     <option value="1">Year</option>
                     <option value="2">2022</option>
                     <option value="3">2021</option>
                     <option value="4">2020</option>
                     <option value="5">2019</option>
                     <option value="6" >2018</options>
                     <option value="7" >2017</options>
                     <option value="8" >2016</options>
                     <option value="9" >2015</options>
                     <option value="10" >2014</options>
                     <option value="11" >Older</options>
                  </select>
                  <select class="show">
                     <option value="1" >Condition</options>
                     <option value="2" >New Condition</options>
                     <option value="3" >Good Condition</options>
                     <option value="4" >Mint Condition</options>
                  </select>
               </div>
            </div>
            <div class="latest_product_inner">
               <div class="row">
                  @foreach($cars as $car)
                  <div class="col-lg-4 col-md-6">
                     <div class="single-product">
                        <div class="product-img">
                           
                           <div class="p_icon">
                              <a href="#">
                              <i class="ti-eye"></i>
                              </a>
                              <a href="#">
                              <i class="ti-heart"></i>
                              </a>
                              <a href="#">
                              <i class="ti-shopping-cart"></i>
                              </a>
                           </div>
                        </div>
                        <div class="product-btm">
                           <a href="{{ url('car-details/'.$car->car_id) }}" class="d-block">
                              <h4>{{ $car->brand_name." ".$car->model." ".$car->variant }}</h4>
                           </a>
                           <div class="mt-3">
                              <span class="mr-4">Rs. {{ $car->price }}</span>
                              <!-- <del>rs175000.00</del> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="left_sidebar_area">
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Browse Categories</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">Hatchback</a>
                        </li>
                        <li>
                           <a href="#">Sedan</a>
                        </li>
                        <li>
                           <a href="#">SUV</a>
                        </li>
                        <li>
                           <a href="#">Luxury</a>
                        </li>
                        <li>
                           <a href="#">Sports Car</a>
                        </li>
                        <li>
                           <a href="#">Commercial Vehicle</a>
                        </li>
                        <li>
                           <a href="#">Two Wheelers</a>
                        </li>
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Product Brand</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">Suzuki</a>
                        </li>
                        <li>
                           <a href="#">Tata</a>
                        </li>
                        <li class="active">
                           <a href="#">BMW</a>
                        </li>
                        <li>
                           <a href="#">Honda</a>
                        </li>
                        <li>
                           <a href="#">Hyundai</a>
                        </li>
                        <li>
                           <a href="#">Mahindra</a>
                        </li>
                        <li>
                           <a href="#">Mercedes</a>
                        </li>
                        <li>
                           <a href="#">Audi</a>
                        </li>
                        <li>
                           <a href="#">Jaguar</a>
                        </li>
                        <li>
                           <a href="#">Range Rover</a>
                        </li>
                        <li>
                           <a href="#">Ford</a>
                        </li>
                        <li>
                           <a href="#">MG Hector</a>
                        </li>
                        <li>
                           <a href="#">Porsche</a>
                        </li>
                        <li>
                           <a href="#">Volvo</a>
                        </li>
                        <li>
                           <a href="#">Kia</a>
                        </li>
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Color Filter</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">Black</a>
                        </li>
                        <li>
                           <a href="#">Red</a>
                        </li>
                        <li class="active">
                           <a href="#">White</a>
                        </li>
                        <li>
                           <a href="#">Blue</a>
                        </li>
                        <li>
                           <a href="#">Spacegrey</a>
                        </li>
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Kilometers</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">0 - 9,999</a>
                        </li>
                        <li>
                           <a href="#">10,000 - 49,999</a>
                        </li>
                        <li class="active">
                           <a href="#">50,000 - 99,999</a>
                        </li>
                        <li>
                           <a href="#">More than 1 Lakh</a>
                        </li>
                        
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Owner Type</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">First Owner</a>
                        </li>
                        <li>
                           <a href="#">Second Owner</a>
                        </li>
                        <li class="active">
                           <a href="#">Third Owner</a>
                        </li>
                        
                        
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Transmission</h3>
                  </div>
                  <div class="widgets_inner">
                     <ul class="list">
                        <li>
                           <a href="#">Automatic</a>
                        </li>
                        <li>
                           <a href="#">Manual</a>
                        </li>
                        
                        
                     </ul>
                  </div>
               </aside>
               <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                     <h3>Price Filter</h3>
                  </div>
                  <div class="widgets_inner">
                     <div class="range_item">
                        <div id="slider-range"></div>
                        <div class="">
                           <label for="amount">Price : </label>
                           <input type="text" id="amount" readonly />
                        </div>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </div>
</section>
<!--================End Category Product Area =================-->
@endsection