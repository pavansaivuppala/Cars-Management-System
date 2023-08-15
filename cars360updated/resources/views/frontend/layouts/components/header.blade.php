<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c3aaada5ac83a6aab0a6b1eda0acae">info@cardrive365.com</a></p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            <li>
                                <a href="{{ url('/login') }}" target="_blank">
                                    Dealer Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ url('/') }}">
            <img src="{{ url('frontend/img/logo.png') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
                <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Buy Cars</a>
                        <ul class="dropdown-menu">

                            @php
                                $categories = CarCategoryServices::GetCategories();
                            @endphp

                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('car_category', [$category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('car_category') }}">All Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('car_details') }}">Product Details</a>
                            </li>
        
                        </ul>
                    </li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Buy by Brand</a>
                        <ul class="dropdown-menu">
                            @php
                                $brands = BrandsServices::GetBrands();
                            @endphp

                            @foreach($brands as $brand)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('car_brand', [$brand->slug]) }}">{{ $brand->name }}</a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('car_brand', 'used-cars-of-all-brands') }}">All Brands</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact_us') }}">Contact</a>
                    </li>
                </ul>
                </div>

                <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                    <li class="nav-item">
                        <input type="text" placeholder="Search Cars" class="search-textbx"><i class="ti-search" aria-hidden="true"></i></input>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->