<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>@yield('title')</title>

  @yield('meta-content')

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/linericon/style.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/css/themify-icons.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/css/flaticon.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/owl-carousel/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/lightbox/simpleLightbox.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/nice-select/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/animate-css/animate.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/vendors/jquery-ui/jquery-ui.css') }}" />
  <!-- main css -->
  <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/css/responsive.css') }}" />
  <link rel="stylesheet" href="{{ url('frontend/css/custom.css') }}" />
  
  @yield('add-css')

  @yield('social-tags')

  @yield('tracking-codes')
</head>

<body>
    @include('frontend.layouts.components.header')

    @yield('content')
  

  @include('frontend.layouts.components.footer')

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ url('frontend/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ url('frontend/js/popper.js') }}"></script>
  <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('frontend/js/stellar.js') }}"></script>
  <script src="{{ url('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
  <script src="{{ url('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ url('frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ url('frontend/vendors/isotope/isotope-min.js') }}"></script>
  <script src="{{ url('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ url('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ url('frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
  <script src="{{ url('frontend/js/mail-script.js') }}"></script>
  <script src="{{ url('frontend/js/theme.js') }}"></script>
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">

  @yield('add-js')

</body>

</html>