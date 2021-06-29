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
                              class="card-title">{{ isset($about) ? __('Edit') : __('Create') }} {{ __('Contacts section') }}</h4>
                        </div>
                        <div class="card-content">
                           <div class="card-body pb-0">
                              @unless(isset($about))
                                 <form action="{{ route('contacts.store') }}" method="post" class="form pt-1">
                                    @csrf
                                    <x-dashboard.about.contacts.add-form/>
                                 </form>
                              @endunless

                              @if(isset($about))
                                 <form action="{{ route('contacts.update', $about->id) }}" method="post"
                                       class="form pt-1">
                                    @method('PUT')
                                    @csrf
                                    <x-dashboard.about.contacts.edit-form :content="$about"/>
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
@endsection
