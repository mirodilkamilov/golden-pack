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
   <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.css" rel="stylesheet">
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
         <!-- Languages -->
         <div class="app-drop">
            {{ Str::upper($locale) }}
            <div>
               @foreach(config('app.languages') as $lang)
                  <a href="{{ route('index', $lang) }}"
                     class="{{ $locale === $lang ? 'active' : '' }}">{{ __($lang) }}</a>
               @endforeach
            </div>
         </div>
      @isset($about->phone)
         <!-- Recall -->
            <div class="callback">
               @foreach($about->phone as $phone)
                  <a href="tel:{{ $phone }}">{{ $phone }}</a>
               @endforeach
            </div>
      @endisset

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
      <form action="{{ route('store', $locale) }}" method="post" class="app-form">
         @csrf
         <div class="row">
            <div class="col-12">
               <div class="form-label-group">
                  <input name="name" value="{{ old('name') }}" type="text" id="name" class="form-control"
                         placeholder="{{ __('Your name') }}">
                  <label for="name">{{ __('Your name') }}</label>
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
            </div>
            <div class="col-12">
               <div class="form-label-group">
                  <input name="phone" value="{{ old('phone') ?? '+998 ' }}" type="text" id="phone" class="form-control"
                         placeholder="{{ __('Phone') }}">
                  <label for="phone">{{ __('Phone') }}</label>
                  @error('phone')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
            </div>
            <div class="col-12 mb-0">
               <div class="form-label-group">
                  <input name="email" value="{{ old('email') }}" type="text" id="email" class="form-control"
                         placeholder="{{ __('Email') }}">
                  <label for="email">{{ __('Email') }}</label>
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
            </div>
            <input type="hidden" name="origin" value="modal">
            <div class="col-12">
               <button class="app-btn mx-auto mt-5">{{ Str::upper(__('Leave a request')) }}</button>
            </div>
         </div>
      </form>
   </div>
</div>

<!-- Modal 2 -->
@php $hasError = session('error') !== null; @endphp
<div class="app-modal modal-2">
   <div class="app-modal-content">
      <img src="{{ $hasError ? '/assets/img/error.svg' : '/assets/img/success.png' }}" style="width: 80px;"
           alt="Success">
      <h2 class="sec-tle">{{ $hasError ? __(session('error')) : __(session('success')) }}</h2>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--<script defer src="/assets/libs/jquery-3.5.1/jquery-3.5.1.min.js"></script>--}}
<script defer src="/assets/libs/popper-core-master/src/popper.js"></script>
<script defer src="/assets/libs/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
<script defer src="/assets/libs/swiper-master/src/swiper.js"></script>
<script defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script defer src="https://unpkg.com/imask"></script>
<!-- My scripts -->
<script defer src="/assets/js/main.min.js"></script>
<script defer src="/assets/js/libs.min.js"></script>

@stack('show-modal-form')
@stack('show-modal-message')

</body>
</html>
