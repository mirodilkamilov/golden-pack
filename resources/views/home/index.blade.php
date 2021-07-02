@extends('layouts.home')

@section('content')
   <div class="lang-container" style="margin: 1rem;">
      @foreach(config('app.languages') as $language)
         <a href="{{ route(Route::currentRouteName(), $language) }}"
            style="padding: 1rem; @if ($language === $locale) {{ 'font-weight: 900; color: black;' }} @endif">{{ $language }}</a>
      @endforeach
   </div>

   <h1 style="text-align: center;">Hero Section</h1>
   @if(isset($about->title))
      <img src="{{ $about->image }}" alt="...">
      <h3>{{ $about->title }}</h3>
      <p>{!! $about->description !!}</p>
   @endif

   <h1 style="text-align: center;">About us</h1>
   @if(isset($about->about_title))
      <img src="{{ $about->about_image }}" alt="...">
      <h3>{{ $about->about_title }}</h3>
      <p>{!! $about->about_description !!}</p>
   @endif

   <h1 style="text-align: center;">Packaging Processes</h1>
   @if(isset($processes))
      <div class="row">
         @foreach($processes as $process)
            <div class="card mb-3" style="max-width: 540px; margin: 1rem;">
               <div class="row g-0">
                  <div class="col-md-4">
                     <img src="{{ $process->image }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="card-title">{{ $process->title }}</h5>
                        <p class="card-text">{!! $process->description !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Equipments</h1>
   @if(isset($equipments))
      <div class="row">
         @foreach($equipments as $equipment)
            <div class="card mb-3" style="max-width: 540px; margin: 1rem;">
               <div class="row g-0">
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="card-title">{{ $equipment->title }}</h5>
                        <p class="card-text">{!! $equipment->description !!}</p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <img src="{{ $equipment->image }}" class="img-fluid rounded-start" alt="...">
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Portfolios</h1>
   @if(isset($portfolios))
      <div class="row">
         @foreach($portfolios as $portfolio)
            <div class="card" style="width: 18rem; margin: 1rem;">
               <img src="{{ $portfolio->image }}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">{{ $portfolio->title }}</h5>
                  <p class="card-text">{!! $portfolio->description !!}</p>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Testimonials</h1>
   @if(isset($testimonials))
      <div class="row">
         @foreach($testimonials as $testimonial)
            <div class="card mb-3" style="max-width: 540px; margin: 1rem;">
               <div class="row g-0">
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="card-title">{{ $testimonial->title }}</h5>
                        <p class="card-text">{!! $testimonial->description !!}</p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <img src="{{ $testimonial->image }}" class="img-fluid rounded-start" alt="...">
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Advantages</h1>
   @if(isset($advantages))
      <div class="row">
         @foreach($advantages as $advantage)
            <div class="card" style="width: 18rem; margin: 1rem;">
               <img src="{{ $advantage->image }}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title">{{ $advantage->title }}</h5>
                  <p class="card-text">{!! $advantage->description !!}</p>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Cooperation</h1>
   @if(isset($cooperation))
      <div class="row">
         @foreach($cooperation->list as $list)
            <div class="card mb-3" style="max-width: 540px; margin: 1rem;">
               <div class="row g-0">
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="card-title">{{ $list['title'] }}</h5>
                        <p class="card-text">{!! $testimonial['description'] !!}</p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <img src="{{ $cooperation->image }}" class="img-fluid rounded-start" alt="...">
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   @endif

   <h1 style="text-align: center;">Contacts</h1>
   @if(isset($about->address))
      <div class="row">
         <div class="card mb-3" style="max-width: 100%; margin: 1rem;">
            <div class="row g-0">
               <div class="col-md-6">
                  <iframe src="{{ $about?->google_map }}" class="img-fluid rounded-start" alt="..."></iframe>
               </div>
               <div class="col-md-6">
                  <div class="card-body">
                     <p class="card-text"><strong>Address:</strong></p>
                     <p class="card-text">{{ $about->address }}</p>

                     <p class="card-text"><strong>Phone:</strong></p>
                     @foreach($about->phone as $phone)
                        <p class="card-text">{{ $phone }}</p>
                     @endforeach

                     <p class="card-text"><strong>Email:</strong></p>
                     @foreach($about->email as $email)
                        <p class="card-text">{{ $email }}</p>
                     @endforeach

                     @if(isset($about->social_media))
                        <p class="card-text"><strong>Social Media:</strong></p>
                        @foreach($about->social_media as $social_media)
                           <p><a href="{{ $social_media['url'] }}" class="card-text">{{ $social_media['name'] }}</a></p>
                        @endforeach
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endif

@endsection