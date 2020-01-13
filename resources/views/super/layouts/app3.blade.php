<!DOCTYPE html>
<html class="loading"  @if (session()->get('locale') == "ar")  lang="ar" @else  lang="en" @endif >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Thaty Foundation for Educational Tools">
  <meta name="keywords" content="Robot, e-training, STEM">
  <meta name="author" content="Developed by Eng. Wael Serag | waelserag1@gmail.com">
  <title>Cpanel
  </title>
  <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/app-assets/images/ico/favicon.ico') }}">
  <!--Start styles-->
  <link rel="stylesheet" href="{{ asset('frontend/css/core.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
  @if (session()->get('locale') == "ar")
      <link rel="stylesheet" href="{{ asset('frontend/css/new-style.css')}}">
  @else
      <link rel="stylesheet" href="{{ asset('frontend/css/new-style2.css')}}">
  @endif
  <!-- END Custom CSS-->
  @yield('styles')
	@stack('styles')
</head>

<body>

  <!--Site preloader-->


  @include('super.includes.header')

  <!-- =============================================== -->
  <main>
      <div class="page_wrapper">
          @yield('breadcrumbs')
          @stack('breadcrumbs')
          <div class="p-t-2 p-b-2">
              <div class="container wow fadeInUp">
                  @yield('breadcrumbs2')
                  @stack('breadcrumbs2')
                  <div class="row">

                      <!-- Left side column. contains the sidebar -->
                      @include('super.includes.sidebar')
                      <!-- =============================================== -->
                      <!-- Content Wrapper. Contains page content -->
                      {{-- @include('super.includes.messages') --}}
                      <!-- Content Header (Page header) -->
                      @yield('content')
                      <!-- /.content -->

                      <!-- /.content-wrapper -->
                  </div>
              </div>
          </div>
      </div>
  </main>
  @include('super.includes.footer')

  <!-- END PAGE LEVEL JS-->
  @yield('scripts')

  @stack('scripts')


</body>

</html>
