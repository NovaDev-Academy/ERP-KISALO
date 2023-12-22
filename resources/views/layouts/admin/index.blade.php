<!DOCTYPE html>
<html lang="en">


 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Kisalo - BackOffice</title>
        <meta name="description" content="Qompac UI is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules.">
        <meta name="keywords" content="premium, admin, dashboard, template, bootstrap 5, clean ui, qompac-ui, admin dashboard,responsive dashboard, optimized dashboard,">
        <meta name="author" content="Iqonic Design">
        <meta name="DC.title" content="Qompac UI Responsive Bootstrap 5 Admin Dashboard Template">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendor/sheperd/dist/css/sheperd.css')}}">

        <!-- Flatpickr css -->
        <link rel="stylesheet" href="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.css')}}">


        <!-- qompac-ui Design System Css -->
        <link rel="stylesheet" href="{{asset('assets/css/qompac-ui.min.css')}}">

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}">
        <!-- Dark Css -->
        <link rel="stylesheet" href="{{asset('assets/css/dark.min.css')}}">

        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css')}}" >

        <!-- RTL Css -->
        <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendor/swiperSlider/swiper-bundle.min.css')}}">

        <!-- custimizar css -->
        <link rel="stylesheet" href="{{asset('assets/css/costumized/style.css')}}">
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">    </head>

    
		 {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> --}}
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


</head>
<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<div id="loading">
    <div class="loader simple-loader">
        <div class="loader-body ">
            <img src="{{ asset('../assets/images/loader.webp') }}" alt="loader" class="image-loader img-fluid " width="15%">
        </div>
    </div>
    </div>
    <!-- loader END -->

    @include('layouts.admin.nav')

    <main class="main-content">
    @include('layouts.admin.header')

         @yield('conteudo')

    @include('layouts.admin.footer')


    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}

    <script>
        $(document).ready(function(){
           $('.select_search_box select').selectpicker();
        })
       </script>
</body>

</html>
