@extends('layouts.dashboard')

@section('content')
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

         <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

         <x-dashboard.alerts/>

         <div class="content-body">

            <section id="multiple-column-form">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header justify-content-center">
                           <h4
                              class="card-title">{{ isset($about) ? __('Edit') : __('Create') }}</h4>
                        </div>
                        <div class="card-content">
                           <div class="card-body pb-0">
                              @unless(isset($about))
                                 <form class="form" action="{{ route('hero-section.store') }}"
                                       method="post" enctype="multipart/form-data">
                                    @csrf

                                    @php $inputs = [
                                     'title',
                                     'description',
                                    ];
                                    @endphp
                                    <x-dashboard.language-tabs :availableLangs="$availableLangs"
                                                               :inputs="$inputs"/>

                                    <x-dashboard.about.hero-section.form :availableLangs="$availableLangs"/>
                                 </form>
                              @endunless

                              @if(isset($about))
                                 <form class="form" action="{{ route('hero-section.update', $about->id) }}"
                                       method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    @php $inputs = [
                                     'title',
                                     'description',
                                    ];
                                    @endphp
                                    <x-dashboard.language-tabs :availableLangs="$availableLangs" :inputs="$inputs"/>

                                    <x-dashboard.about.hero-section.form :availableLangs="$availableLangs"
                                                                         :content="$about"/>
                                 </form>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>

   @push('image-preview')
      <script src="{{ asset('assets/js/image-preview.js') }}"></script>
   @endpush

   @push('change-language-tabs')
      <script src="{{ asset('assets/js/change-language-tabs.js') }}"></script>
   @endpush
@endsection
