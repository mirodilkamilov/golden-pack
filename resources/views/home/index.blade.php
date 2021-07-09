@extends('layouts.home')

@section('content')
   <main>
      <!-- Intro -->
      <section class="intro" id="intro">
         <div class="intro-item">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <h1>{{ $about?->title }}</h1>
                     {!! $about?->description !!}
                     <button class="app-btn modal-switch-1">{{ Str::upper(__('Leave a request')) }}</button>
                  </div>
                  <div class="col-md-6">
                     <img src="{{ $about?->image }}" alt="Golden Pack">
                  </div>
               </div>
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
                     {!! $about->about_description !!}
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
                           {!! $process->description !!}
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
                                 {!! $equipment->description !!}
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
                           {!! $portfolio->description !!}
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
                           <h4>{{ $testimonial->name }}</h4>
                           <span>{{ $testimonial->title }}</span>
                           {!! $testimonial->description !!}
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
                           {!! $advantage->description !!}
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
                        {!! $list['description'] !!}
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
                  <input type="hidden" name="origin" value="text-box">
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

               <!-- Social Media -->
                  @isset($about->social_media)
                     <div class="social">
                        @foreach($about->social_media as $social_media)
                           @if($about->social_media[$loop->index]['name'] === 'telegram')
                              <a href="{{ $about->social_media[$loop->index]['url'] }}" class="social-item">
                                 <svg id="telegram_9_" data-name="telegram (9)" xmlns="http://www.w3.org/2000/svg"
                                      width="16"
                                      height="13.537" viewBox="0 0 16 13.537">
                                    <path class="net" id="Path_25" data-name="Path 25"
                                          d="M15.753.371A1.039,1.039,0,0,0,14.929,0a1.619,1.619,0,0,0-.575.115L.81,5.285c-.719.274-.816.686-.809.907s.126.626.859.86l.013,0,1.9.543,9.25-4.726a.468.468,0,0,1,.554.738h0L7.434,9.076l-.147.595L9.124,11.15,11.669,13.2l.007.005a1.455,1.455,0,0,0,.885.332,1.242,1.242,0,0,0,1.184-1.1L15.963,1.479a1.309,1.309,0,0,0-.21-1.108Zm0,0"
                                          fill="#fff"></path>
                                    <path class="net" id="Path_26" data-name="Path 26"
                                          d="M6.554,8.732a.467.467,0,0,1,.114-.209l3.375-3.586-6.263,3.2L5.2,12.2a1.59,1.59,0,0,0,.351.583l1-4.055Zm0,0"
                                          fill="#fff"></path>
                                    <path class="net" id="Path_27" data-name="Path 27"
                                          d="M6.425,13.163a1.439,1.439,0,0,0,.961-.413l1.04-.958L7.039,10.675Zm0,0"
                                          fill="#fff"></path>
                                 </svg>
                              </a>
                           @endif

                           @if($about->social_media[$loop->index]['name'] === 'facebook')
                              <a href="{{ $about->social_media[$loop->index]['url'] }}" class="social-item">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="8.308" height="16"
                                      viewBox="0 0 8.308 16">
                                    <g id="facebook-app-symbol" transform="translate(-3.846)">
                                       <g id="Group_20" data-name="Group 20">
                                          <path class="net" id="f_1_"
                                                d="M9.239,16V8.7h2.449l.367-2.845H9.239V4.041c0-.823.228-1.385,1.41-1.385h1.505V.111A20.41,20.41,0,0,0,9.96,0,3.427,3.427,0,0,0,6.3,3.759v2.1H3.846V8.7H6.3V16Z"
                                                fill="#fff"></path>
                                       </g>
                                    </g>
                                 </svg>
                              </a>
                           @endif

                           @if($about->social_media[$loop->index]['name'] === 'instagram')
                              <a href="{{ $about->social_media[$loop->index]['url'] }}" class="social-item">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="instagram_10_" data-name="instagram (10)" transform="translate(0)">
                                       <path class="net" id="Path_28" data-name="Path 28"
                                             d="M11.669,0H4.331A4.336,4.336,0,0,0,0,4.331v7.338A4.336,4.336,0,0,0,4.331,16h7.338A4.336,4.336,0,0,0,16,11.669V4.331A4.336,4.336,0,0,0,11.669,0ZM8,12.375A4.375,4.375,0,1,1,12.375,8,4.38,4.38,0,0,1,8,12.375Zm4.479-7.718a1.293,1.293,0,1,1,1.293-1.293A1.294,1.294,0,0,1,12.479,4.657Zm0,0"
                                             fill="#fff"></path>
                                       <path class="net" id="Path_29" data-name="Path 29"
                                             d="M8,4.563A3.437,3.437,0,1,0,11.437,8,3.441,3.441,0,0,0,8,4.563Zm0,0"
                                             fill="#fff"></path>
                                       <path class="net" id="Path_30" data-name="Path 30"
                                             d="M12.479,3.009a.355.355,0,1,0,.355.355A.355.355,0,0,0,12.479,3.009Zm0,0"
                                             fill="#fff"></path>
                                    </g>
                                 </svg>
                              </a>
                           @endif
                        @endforeach
                     </div>
                  @endisset
               </div>
               <div class="col-md-6">
                  <iframe src="{{ $about?->google_map }}"
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
                @if(old('origin') === 'text-box')
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('.contacts').offset().top
                }, 100);
                @else
                $('.overlay').toggleClass('active');
                 $('.modal-1').toggleClass('active');
                @endif
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