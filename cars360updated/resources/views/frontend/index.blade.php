@extends('frontend.layouts.app')

@section('title')
CarDrive365
@endsection

@section('content')
<!--================Home Banner Area =================-->
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <p class="sub text-uppercase">Best Car Collection</p>
            <h3><span>Buy</span> your <br />cars <span>Tension Free</span></h3>
            <h4>All in one automobile hub.</h4>
            <a class="main_btn mt-40" href="#">View Our Collection</a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!--================Search Bar=================-->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="main_title">
            <h2><span>Search Cars</span></h2>
            <!-- <p>Book your appointment fast</p> -->
          </div>
        </div>
        <div class="col-12">
          <div class="inner-addon left-addon">
              <i class="fas fa-search"></i>
              <input id="mainSearchBar" type="text" class="form-control" />
          </div>
          <div class="d-flex justify-content-center mb-5">
            <a id="mainSearchButton" class="main_btn mt-3" href="javascript:;">Search</a>
          </div>
        </div>
      </div>
      <div class="row mb-5" id="searchResults">

        </div>
    </div>
  

  
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Waranty</h3>
            </a>
            <p>Tension Free Cars</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Full paper work</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Well maintained cars</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Browse Cars</span></h2>
            <!-- <p>Book your appointment fast</p> -->
          </div>
        </div>
      </div>

      <div class="row">
      
      @foreach($data as $key => $car)
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
            <div class="product-btm">
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
  </section>
  <!--================ End Inspired Product Area =================-->

  <!--================ Start Blog Area =================-->
  <!-- <section class="blog-area section-gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>latest videos</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{ url('frontend/img/b1.jpg') }}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{ url('frontend/img/b2.jpg') }}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{ url('frontend/img/b3.jpg') }}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <style>
    .single-product .product-img .p_icon {
      width: 100% !important;
    }

    .genric-btn.default{
      line-height: normal;
      padding: 10px !important;
      margin: 3px;
    }
  </style>
  <!--================ End Blog Area =================-->
@endsection
<style>
  #mainSearchBar{
    width: 100%;
    border: 1px solid #000000b5;
    border-radius: 20px;
    background-color: #ffffff;
    height: 41px;
    font-size: large;
  }

  .inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .fas {
  position: absolute;
  padding: 15px;
  pointer-events: none;
}

/* align icon */
.left-addon .fas  { left:  0px;}
.right-addon .fas { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }
</style>

<script>
  window.onload = (event) => {
      $(function() {
        var searchResults={};

        $("#mainSearchButton").on("click", function(){
          var query= $("#mainSearchBar").val();
          var data = {}
          data['_token'] = '{{csrf_token()}}';
          data['details'] = query;
          console.log('post', data)
          $.ajax({
            type: "POST",
            url: '/search',
            data: data,
            success: function(data) {
              searchResults = JSON.parse(data);
              searchResults= searchResults['data'];
              console.log("done", searchResults);
              showSearchResults(searchResults)
            },
            error: function(data, textStatus, errorThrown) {
              console.log(data);
            },
          })
        })

        function showSearchResults(searchResults){
         console.log("t1", searchResults)

          for(var result=0; result<searchResults.length; result++){
            console.log("t2")

            console.log(searchResults['data'])
          var myvar = '<div class="col-lg-4 col-md-6 mb-5">'+
          '          <div class="single-product mb-5">'+
          '            <div class="product-img">'+
          '              <img class="img-fluid w-100" src="/'+ searchResults[result]['frontImage'] +'" alt="" />'+
          '              <div class="p_icon">'+
          '                <a href="/car-details/'+ searchResults[result]['carId']+'">'+
          '                  <i class="ti-eye"></i>'+
          '                </a>'+
          '              </div>'+
          '            </div>'+
          '            <div class="product-btm">'+
          '              <a href="/car-details/'+searchResults[result]['carId'] +'" class="d-block">'+
          '                <h4>'+ searchResults[result]['brand']+'</h4>'+
          '              </a>'+
          '              <div class="mt-3">'+
          '                <span class="mr-4">'+ searchResults[result]['price']+'</span>'+
          '              </div>'+
          '            </div>'+
          '          </div>'+
          '        </div>';
          console.log(myvar)
            $("#searchResults").html($("#searchResults").html() + myvar)
          }

	
        }
      })
    }</script>