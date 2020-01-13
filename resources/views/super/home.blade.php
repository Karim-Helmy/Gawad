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
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-6 header-top__contact">

                </div>
                <div class="col-12 col-md-6 header-top__login">
                    <div class="header-top__item">
                        <!-- <a href="#"> <i class="material-icons">person</i> login </a> -->
                        @if (session()->get('locale') == "ar")
                            <a href="{{ url("setlocale/en") }}" class="nav-link btn btn-secondary btn-lang">E</a>
                        @else
                            <a href="{{ url("setlocale/ar") }}" class="nav-link btn btn-secondary btn-lang">ع</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light header-main">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">
                <img src="{{ asset('frontend/home/assets/imgs/logo2.jpeg')}}" alt="" style="width: 150px" class="" />
            </a>
            <!-- <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#"
                      >Home <span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">about</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn btn-secondary btn-lang" href="#">ع</a>
                  </li>
                </ul>
              </div> -->
        </div>
    </nav>
</header>

<section id="main-head" class="main-head df-center">
    <div class="main-head-slider">
        <div class="owl-carousel owl-theme">
            <div
                    class="main-head-slider__item item"
                    style="background-image: url('{{ asset('frontend/home/assets/imgs/backgrounds/head-bg-1.jpg')}}') !important;"
            ></div>
            <div
                    class="main-head-slider__item item"
                    style="background-image: url('{{ asset('frontend/home/assets/imgs/backgrounds/head-bg-2.jpg')}}') !important;"
            ></div>
            <div
                    class="main-head-slider__item item"
                    style="background-image: url('{{ asset('frontend/home/assets/imgs/backgrounds/head-bg-3.jpg')}}') !important;"
            ></div>
        </div>
    </div>
    <div class="container-fluid df-center main-head-content">
        <div class="row df-center">
            <div class="col-12 text-center">
                <h1 class="main-head__header h1">{{ trans('admin.slider-intro') }}</h1>
                <div class="btn btn-primary"><a style="color: white" href="{{ surl('/') }}">{{ trans('admin.slider-des') }}</a>

                    </div>
            </div>
        </div>
    </div>
</section>
<section id="about" class="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 about-content">
                <h3 class="h3">{{ trans('admin.mission') }}
                </h3>
                <p>
{{ trans('admin.main-page') }}
           </p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <ul class="about-numbers">
                    <li class="about-numbers__item">
                        <span class="about-numbers__num" data-count="300">0</span>
                        <span class="about-numbers__text">طالب</span>
                    </li>
                    <li class="about-numbers__item">
                        <span class="about-numbers__num" data-count="1250">0</span>
                        <span class="about-numbers__text">مشروع</span>
                    </li>
                    <li class="about-numbers__item">
                        <span class="about-numbers__num" data-count="56">0</span>
                        <span class="about-numbers__text">شركة</span>
                    </li>
                    <li class="about-numbers__item">
                        <span class="about-numbers__num" data-count="689">0</span>
                        <span class="about-numbers__text">مشاريع ناجحة</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <ul class="services-items">
                    <li class="services-items__item">
                        <div class="services-items__icon">
                            <img
                                    src="{{ asset('frontend/home/assets/imgs/icons/services-1.svg')}}"
                                    alt="services icon"
                            />
                        </div>
                        <p class="services-items__text">
                        المنافسون
                        </p>
                    </li>
                    <li class="services-items__item">
                        <div class="services-items__icon">
                            <img
                                    src="{{ asset('frontend/home/assets/imgs/icons/services-2.svg')}}"
                                    alt="services icon"
                            />
                        </div>
                        <p class="services-items__text">
                           فريق العمل
                        </p>
                    </li>

                    <li class="services-items__item">
                        <div class="services-items__icon">
                            <img
                                    src="{{ asset('frontend/home/assets/imgs/icons/services-3.svg')}}"
                                    alt="services icon"
                            />
                        </div>
                        <p class="services-items__text">
                          العملاء المستهدفين
                        </p>
                    </li>

                    <li class="services-items__item">
                        <div class="services-items__icon">
                            <img
                                    src="{{ asset('frontend/home/assets/imgs/icons/services-4.svg')}}"
                                    alt="services icon"
                            />
                        </div>
                        <p class="services-items__text">
                        الخطة
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="gallery-sec" class="gallery-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center h-white mb-3">
                <h3>الصور</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 df-center">
                <nav class="gallery-sec-nav">
                    <ul class="df-center">
                        <li class="current"><a href="#">All</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Management</a></li>
                        <li><a href="#">Apps</a></li>
                        <li><a href="#">Design</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 df-center">
                <div id="projects" class="df-center">
                    <ul id="gallery">
                        <li class="design">
                            <a href="#">
                                <img
                                        src="https://source.unsplash.com/jjtdL443L4w/700x700"
                                />
                            </a>
                        </li>
                        <li class="apps">
                            <a href="#"
                            ><img src="https://source.unsplash.com/y1yQQmozTBw/700x700"
                                /></a>
                        </li>
                        <li class="management">
                            <a href="#"
                            ><img src="https://source.unsplash.com/b18TRXc8UPQ/700x700"
                                /></a>
                        </li>
                        <li class="apps design">
                            <a href="#"
                            ><img src="https://source.unsplash.com/klRB1BB9pV8/700x700"
                                /></a>
                        </li>
                        <li class="business">
                            <a href="#"
                            ><img src="https://source.unsplash.com/y1yQQmozTBw/700x700"
                                /></a>
                        </li>
                        <li class="business design">
                            <a href="#"
                            ><img src="https://source.unsplash.com/1vwwZ-BmmrE/700x700"
                                /></a>
                        </li>
                        <li class="apps">
                            <a href="#"
                            ><img src="https://source.unsplash.com/WLOCr03nGr0/700x700"
                                /></a>
                        </li>
                        <li class="management">
                            <a href="#"
                            ><img src="https://source.unsplash.com/iOykDIkZLQw/700x700"
                                /></a>
                        </li>
                    </ul>
                </div>
                <!-- modal gallery -->
                <div class="gallery">
                    <a class="close" href="#">
                        <i>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </i>
                    </a>
                    <div class="gallary-container df-center"><img src="" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blog-sec" class="blog-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3>اخر الاخبار</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4  mb-3 df-center">
                <div class="card" style="width: 18rem;">
                    <img
                            src="{{ asset('frontend/home/assets/imgs/backgrounds/blog-1.jpg')}}"
                            class="card-img-top"
                            alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title"> كتيّب بمثابة دليل</h5>
                        <p class="card-text">

                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
                        </p>
                        <a href="#" class="btn btn-white">read more </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3 df-center">
                <div class="card" style="width: 18rem;">
                    <img
                            src="{{ asset('frontend/home/assets/imgs/backgrounds/blog-1.jpg')}}"
                            class="card-img-top"
                            alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title"> كتيّب بمثابة دليل</h5>
                        <p class="card-text">
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
                        </p>
                        <a href="#" class="btn btn-white">read more </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3 df-center">
                <div class="card" style="width: 18rem;">
                    <img
                            src="{{ asset('frontend/home/assets/imgs/backgrounds/blog-1.jpg')}}"
                            class="card-img-top"
                            alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title"> كتيّب بمثابة دليل</h5>
                        <p class="card-text">

                          هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
                        </p>
                        <a href="#" class="btn btn-white">read more </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">

    <div class="footer-bottom">
        <div class="footer-bottom__text text-center">
            <p>Copyright © 2019 10Feedy</p>
        </div>
    </div>
</footer>
<!-- external scripts  -->
<script src="{{ asset('frontend/home/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/home/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/home/assets/plugins/owlCarousel/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/home/assets/js/main.js')}}"></script>
<script>
    $(document).ready(function() {
        "use strict";
        // call slider carousel

        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            dots: false
        });
    });
</script>
</body>
</html>
