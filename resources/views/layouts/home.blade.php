<!DOCTYPE html>
<html lang="ru">
<head>
   <!-- Head -->
   <title>Golden Pack</title>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="icon" href="/assets/logo-tab.png" type="image/png">
   <link rel="stylesheet" href="/assets/libs/font-awesome-5-pro/css/all.min.css">
   <link rel="stylesheet" href="/assets/libs/bootstrap-4.5.3-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="/assets/libs/fullPage-master/dist/fullpage.min.js">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.css" rel="stylesheet">
   <link rel="stylesheet" href="/assets/libs/animate.css-main/animate.min.css">
   <link rel="stylesheet" href="/assets/libs/touch-sideswipe-master/dist/touch-sideswipe.min.css">
   <link rel="stylesheet" href="/assets/css/main.min.css">
</head>
<body>
<!-- Header -->
<header>
   <div class="container">
      <nav>
         <!-- Navbar brand -->
         <a href="#intro" class="brand"><img src="/assets/logo.png" alt="Golden Pack logo"></a>
         <!-- Items -->
         <ul>
            <li><a href="#about-company">{{ __('About company') }}</a></li>
            <li><a href="#equipment">{{ __('Equipment') }}</a></li>
            <li><a href="#portfolio">{{ __('Portfolios') }}</a></li>
            <li><a href="#comment">{{ __('Testimonials') }}</a></li>
            <li><a href="#cooperation">{{ __('Cooperation') }}</a></li>
            <li><a href="#contacts">{{ __('Contacts') }}</a></li>
         </ul>

      @if(isset($about->phone))
         <!-- Recall -->
            <div class="callback">
               @foreach($about->phone as $phone)
                  <a href="tel:{{ $phone }}">{{ $phone }}</a>
               @endforeach
            </div>
      @endif

      <!-- Ham button -->
         <svg class="ham hamRotate" viewBox="0 0 100 100" width="60">
            <path class="line top"
                  d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20"></path>
            <path class="line middle" d="m 70,50 h -40"></path>
            <path class="line bottom"
                  d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20"></path>
         </svg>
         <!-- Mobile navbar -->
         <div class="mob-nav">
            <div>
               <div class="list"></div>
               <div class="list"></div>
               <div class="list"></div>
               <div class="list main">
                  <ul>
                     <li><a href="#about-company">{{ __('About company') }}</a></li>
                     <li><a href="#equipment">{{ __('Equipment') }}</a></li>
                     <li><a href="#portfolio">{{ __('Portfolios') }}</a></li>
                     <li><a href="#comment">{{ __('Testimonials') }}</a></li>
                     <li><a href="#cooperation">{{ __('Cooperation') }}</a></li>
                     <li><a href="#contacts">{{ __('Contacts') }}</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
   </div>
</header>

@yield('content')

<!-- Footer, scripts and modals -->
<div class="overlay"></div>

<!-- Modal 1 -->
<div class="app-modal modal-1">
   <div class="app-modal-content">
      <!-- Close btn -->
      <i class="fas fa-times-circle modal-close"></i>
      <!-- Content -->
      <h2 class="sec-tle">{{ __('Leave an application and we will contact you') }}</h2>
      <form class="app-form">
         <div class="row">
            <div class="col-12 mb-3">
               <input type="text" placeholder="{{ __('Your name') }}" required="" pattern="^[A-Za-zА-Яа-яЁё\s]+$">
            </div>
            <div class="col-12 mb-3">
               <input type="text" placeholder="{{ __('Phone number') }}" value="+998" id="imask" required="">
            </div>
            <div class="col-12 mb-3">
               <input type="e-mail" placeholder="{{ __('Email') }}">
            </div>
            <div class="col-12">
               <button class="app-btn mx-auto mt-5">{{ Str::upper(__('Leave a request')) }}</button>
            </div>
         </div>
      </form>
   </div>
</div>

<!-- Modal 2 -->
<div class="app-modal modal-2">
   <div class="app-modal-content">
      <img src="/assets/img/success.png" alt="Success">
      <h2 class="sec-tle">{{ __('The application has been sent successfully!') }}</h2>
      <button class="app-btn mx-auto mt-5 modal-close posr">{{ Str::upper(__('close the window')) }}</button>
   </div>
</div>
<footer>
   <div class="container">
      <p>Golden Pack &copy; <span id="year"></span> {{ __('all rights reserved') }}</p>
      <p class="text-right">{{ __('Developed by') }} <a href="https://usoft.uz/" target="_blank">USOFT</a></p>
   </div>
</footer>

<script>
    document.getElementById('year').innerHTML = new Date().getFullYear();
</script>

<!-- Vendor -->
<script defer="" src="/assets/libs/jquery-3.5.1/jquery-3.5.1.min.js"></script>
<script defer="" src="/assets/libs/popper-core-master/src/popper.js"></script>
<script defer="" src="/assets/libs/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
<script defer="" src="/assets/libs/swiper-master/src/swiper.js"></script>
<script defer="" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script defer="" src="/assets/libs/Counter-Up-master/jquery.counterup.min.js"></script>
<script defer="" src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script defer="" src="/assets/libs/touch-sideswipe-master/dist/touch-sideswipe.min.js"></script>
<script defer="" src="/assets/libs/WOW-master/dist/wow.min.js"></script>
<script defer="" src="https://unpkg.com/imask"></script>
<!-- My scripts -->
<script defer="" src="/assets/js/main.min.js"></script>
<script defer="" src="/assets/js/libs.min.js"></script>
</body>
</html>
