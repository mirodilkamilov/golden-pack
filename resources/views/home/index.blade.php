@extends('layouts.home')

@section('content')
   <main>
      <!-- Intro -->
      <section class="intro" id="intro">
         <div class="intro-item">
            <div class="container">
               @isset($about->title)
                  <div class="row">
                     <div class="col-md-6">
                        <h1>{{ $about->title }}</h1>
                        <p>
                           {!! $about->description !!}
                        </p>
                        <button class="app-btn modal-switch-1">{{ Str::upper(__('Leave a request')) }}</button>
                     </div>
                     <div class="col-md-6">
                        <img src="{{ $about->image }}" alt="Golden Pack">
                     </div>
                  </div>
               @endisset
            </div>
         </div>
      </section>

      <!-- About company -->
      <section class="about-company" id="about-company">
         <div class="container">
            @isset($about->about_title)
               <div class="row">
                  <div class="col-md-6">
                     <img src="{{ $about->about_image }}" class="main" alt="Golden Pack">
                  </div>
                  <div class="col-md-6">
                     <img src="/assets/img/gradient-tle.svg" alt="Golden Pack">
                     <h4>{{ $about->about_title }}</h4>
                     <p>{!! $about->about_description !!}</p>
                  </div>
               </div>
            @endisset
         </div>
      </section>

      <!-- Process -->
      <section class="procces with-py">
         <div class="container">
            <h2 class="sec-tle">{{ __('Product packaging process') }}</h2>
            <div class="row">
               @isset($processes)
                  @foreach($processes as $process)
                     <div class="col-lg-3 col-md-6">
                        <div class="box">
                           <img src="{{ $process->image }}" alt="{{ $process->title }}">
                           <h4>{{ $process->title }}</h4>
                           <p>{!! $process->description !!}</p>
                        </div>
                     </div>
                  @endforeach
               @endisset
            </div>
         </div>
      </section>

      <!-- Equipment -->
      <section class="equipment" id="equipment">
         @isset($equipments)
            <div class="swiper-container swiper-1">
               <div class="swiper-wrapper">
                  @foreach($equipments as $equipment)
                     <div class="swiper-slide">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6 main">
                                 <!-- Bg img -->
                                 <img src="/assets/img/equipment.jpg" class="bg" alt="Golden Pack">
                                 <!-- Content -->
                                 <h2>{{ $equipment->title }}</h2>
                                 <p>{!! $equipment->description !!}</p>
                                 <div class="control">
                                    <div>
                                       <div class="swiper-prev-1 m-0"><i class="fal fa-long-arrow-left"></i></div>
                                       <div class="swiper-next-1 m-0"><i class="fal fa-long-arrow-right"></i></div>
                                    </div>
                                    <div class="swiper-pagination-1"></div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="img-box">
                                    <img src="{{ $equipment->image }}" alt="Golden Pack">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         @endisset
      </section>

      <!-- Portfolio -->
      <section class="portfolio with-py" id="portfolio">
         <div class="container">
            <h2 class="sec-tle for-btns text-left">
               {{ __('Portfolios') }}
               <div class="control">
                  <div class="swiper-prev-2 m-0 mr-3"><i class="fal fa-long-arrow-left"></i></div>
                  <div class="swiper-next-2 m-0"><i class="fal fa-long-arrow-right"></i></div>
               </div>
            </h2>
            @isset($portfolios)
               <div class="swiper-container swiper-2">
                  <div class="swiper-wrapper">
                     @foreach($portfolios as $portfolio)
                        <div class="swiper-slide">
                           <img src="{{ $portfolio->image }}" alt="Golden Pack">
                           <h4>{{ $portfolio->title }}</h4>
                           <p>{!! $portfolio->description !!}</p>
                        </div>
                     @endforeach
                  </div>
               </div>
            @endisset
         </div>
      </section>

      <!-- Comments -->
      <section class="comment with-py" id="comment">
         <div class="container">
            <h2 class="sec-tle text-white">{{ __('Testimonials') }}</h2>
            @isset($testimonials)
               <div class="swiper-container swiper-3">
                  <div class="swiper-wrapper">
                     @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                           <img src="{{ $testimonial->image }}" alt="{{ $testimonial->title }}">
                           <h4>{{ $testimonial->title }}</h4>
                           <span>Гендиректор</span>
                           <p>{!! $testimonial->description !!}</p>
                        </div>
                     @endforeach
                  </div>
               </div>
               <div class="control">
                  <div class="swiper-prev-3 m-0"><i class="fal fa-long-arrow-left"></i></div>
                  <div class="swiper-next-3 m-0"><i class="fal fa-long-arrow-right"></i></div>
               </div>
            @endisset
         </div>
      </section>

      <!-- Process -->
      <section class="procces with-p">
         <div class="container">
            <h2 class="sec-tle">{{ __('Advantages') }}</h2>
            @isset($advantages)
               <div class="row">
                  @foreach($advantages as $advantage)
                     <div class="col-lg-4 col-md-6">
                        <div class="box">
                           <img src="{{ $advantage->image }}" alt="{{ $advantage->title }}">
                           <h4>{{ $advantage->title }}</h4>
                           <p>{{ $advantage->description }}</p>
                        </div>
                     </div>
                  @endforeach
               </div>
            @endisset
         </div>
      </section>

      <!-- Cooperation -->
      <section class="cooperation with-p" id="cooperation">
         <div class="container">
            <h2 class="sec-tle">{{ __('Cooperation') }}</h2>
            <div class="row">
               <div class="col-md-6">
                  <img src="{{ $cooperation?->image }}" class="main" alt="{{ $cooperation?->title }}">
               </div>
               <div class="col-md-6">
                  @isset($cooperation->list)
                     @foreach($cooperation->list as $list)
                        <h4>{{ $list['title'] }}</h4>
                        <p>{!! $list['description'] !!}</p>
                     @endforeach
                  @endisset
               </div>
            </div>
         </div>
      </section>

      <!-- Callback -->
      <section class="contacts with-py">
         <h2 class="sec-tle">{{ __('Leave an application and we will contact you') }}</h2>
         <div class="container">
            <form action="{{ route('store', $locale) }}" method="post" class="app-form">
               @csrf
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-label-group">
                        <input name="name" value="{{ old('name') }}" type="text" id="name" class="form-control"
                               placeholder="{{ __('Your name') }}">
                        <label for="name">{{ __('Your name') }}</label>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-label-group">
                        <input name="phone" value="{{ old('phone') ?? '+998 ' }}" type="text" id="phone"
                               class="form-control"
                               placeholder="{{ __('Phone') }}">
                        <label for="phone">{{ __('Phone') }}</label>
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4 mb-0">
                     <div class="form-label-group">
                        <input name="email" value="{{ old('email') }}" type="text" id="email" class="form-control"
                               placeholder="{{ __('Email') }}">
                        <label for="email">{{ __('Email') }}</label>
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="app-btn mx-auto mt-5">{{ Str::upper(__('Leave a request')) }}</button>
                  </div>
               </div>
            </form>
         </div>
      </section>

      <!-- Contacts -->
      <section class="footer with-py" id="contacts">
         <div class="container">
            <h2 class="sec-tle text-white">{{ __('Contacts') }}</h2>
            <div class="row">
               <div class="col-md-6">
                  <h4>{{ __('Address') }}: </h4>
                  <p class="mb-4">{{ $about?->address }}</p>
                  @isset($about->phone)
                     <h4>{{ __('Phone number') }}:</h4>
                     @foreach($about->phone as $phone)
                        <p class="{{ $loop->last ? 'mb-4' : 'mb-1' }}"><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                     @endforeach
                  @endisset

                  @isset($about->email)
                     <h4>{{ __('Email') }}:</h4>
                     @foreach($about->email as $email)
                        <p><a href="e-mail:{{ $email }}">{{ $email }}</a></p>
                     @endforeach
                  @endisset
               </div>
               <div class="col-md-6">
                  <iframe
                     src="{{ $about?->google_map }}"
                     width="100%" height="370" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
            </div>
         </div>
      </section>
   </main>

   @if($errors->any())
      @push('show-modal-form')
         <script>
             $(document).ready(function () {
                 $('.overlay').toggleClass('active');
                 $('.modal-1').toggleClass('active');
             });
         </script>
      @endpush
   @endif

   @if(session('success') || session('error'))
      @push('show-modal-message')
         <script>
             $(document).ready(function () {
                 $('.overlay').toggleClass('active');
                 $('.modal-2').toggleClass('active');
             });
         </script>
      @endpush
   @endif
@endsection