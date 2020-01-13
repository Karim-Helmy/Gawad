<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>10Feedy</title>

  <!-- bootstrab En  -->
  @if (session()->get('locale') == "ar")
    <link rel="stylesheet" href="{{ asset('frontend/home/assets/css/rtl/bootstrap.min.css')}}" />

  @else
    <link rel="stylesheet" href="{{ asset('frontend/home/assets/css/bootstrap/bootstrap.min.css')}}" />

  @endif
<!-- matterial icons  -->
  <link rel="stylesheet" href="{{ asset('frontend/home/assets/fonts/material-icons/css/material-icons.min.css')}}"/>

  <link rel="stylesheet" href="{{ asset('frontend/home/assets/css/style.css')}}" />
  @if (session()->get('locale') == "ar")
    <link rel="stylesheet" href="{{ asset('frontend/home/assets/css/rtl.css')}}" />

  @endif

</head>
<body>
<header class="header">

  <nav class="navbar navbar-expand-lg navbar-light bg-light header-main">
    <div class="container">
      <a class="navbar-brand mx-auto" href="#">
        <img src="{{ asset('frontend/home/assets/imgs/logo2.jpeg')}}" alt="" style="width: 150px" class="" />
      </a>



    </div>
  </nav>
</header>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <section class="col-sm-5 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 box-shadow-2">
        <div class="card border-grey border-lighten-3 px-2 my-0 row">
          <div class="card-header no-border pb-1">
            <div class="card-body">
              <h2 class="error-code text-center mb-2">400</h2>
              <h3 class="text-uppercase text-center">Bad Request</h3>
            </div>
          </div>
          <div class="card-content px-2">
            <div class="row py-2">
              <div class="col-12">
                <a href="{{url('/')}}" class="btn btn-primary btn-block btn-lg"><i class="la la-home"></i> Back to Home</a>
              </div>
            </div>
          </div>

        </div>
      </section>
    </div>
  </div>
</div>



</body>
</html>
