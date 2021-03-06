@extends('layouts.dashboard')

@section('content')
   <!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

         @php $slicedSegment =  $slicedSegment ?? null; @endphp
         <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"
                             :slicedSegment="$slicedSegment"/>

         <x-dashboard.alerts/>

         <div class="content-body">
            <section id="multiple-column-form">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header justify-content-center">
                           <h4 class="card-title">
                              {{ isset($content) ? __('Edit') : __('Create') }} {{ __($currentRoute) }}
                           </h4>
                        </div>
                        <div class="card-content">
                           <div class="card-body pb-0">
                              <form class="form" method="post" enctype="multipart/form-data"
                                    action="{{ isset($content) ? route($currentRoute.'.update', $content->id) : route($currentRoute.'.store') }}">
                                 @csrf
                                 @if(isset($content))
                                    @method('PUT')
                                 @endif

                                 @php
                                    $currentRoute = Route::currentRouteName();
                                    $isTestimonialsRoute = $currentRoute === 'testimonials.create' || $currentRoute === 'testimonials.edit';
                                    $content = $content ?? null;
                                 @endphp
                                 @if($isTestimonialsRoute)
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-label-group mb-1">
                                             <input name="name" type="text" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="{{ __('From whom') }}"
                                                    value="{{ old('name') ?? $content?->name }}">
                                             <label for="name">{{ __('From whom') }}</label>
                                             @error('name')
                                             <p class="text-danger mb-0">{{ $message }}</p>
                                             @enderror
                                          </div>
                                       </div>
                                    </div>
                                 @endif
                                 @php $inputs = [
                                     'title',
                                     'description',
                                    ];
                                 @endphp
                                 <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                            :inputs="$inputs"/>
                                 <x-dashboard.template-form :availableLangs="$availableLangs" :positions="$positions"
                                                            :content="$content"/>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <!-- END: Content-->

   @push('image-preview')
      <script src="{{ asset('assets/js/image-preview.js') }}"></script>
   @endpush

   @push('change-language-tabs')
      <script src="{{ asset('assets/js/change-language-tabs.js') }}"></script>
   @endpush
@endsection
