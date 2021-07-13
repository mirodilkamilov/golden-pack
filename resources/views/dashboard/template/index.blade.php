@extends('layouts.dashboard')

@section('content')
   <!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

         <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

         <x-dashboard.alerts/>

         @php
            $isTestimonialsRoute = Route::currentRouteName() === 'testimonials.index';
         @endphp
         <div class="content-body">
            <section id="data-thumb-view" class="data-thumb-view-header">
               <div class="table-responsive">
                  <a href="{{ route($currentRoute.'.create') }}" class="btn btn-outline-primary" tabindex="0">
                     <span><i class="feather icon-plus"></i> {{ __('Add') }}</span>
                  </a>
                  <table class="table data-thumb-view" id="custom-thumb-view">
                     <thead>
                     <tr>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ $isTestimonialsRoute ? __('From whom') : __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Actions') }}</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($contents as $content)
                        <tr>
                           <td class="product-img">
                              <img src="{{ $content->image }}" alt="Img placeholder">
                           </td>
                           <td class="product-category position">{{ $content->position }}</td>
                           <td
                              class="product-name title">{{ Route::currentRouteName() === 'testimonials.index' ? $content->name : $content->title }}</td>
                           <td class="text-center">
                              {!! $content->description !!}
                           </td>
                           <td class="product-action text-center">
                              <a href="{{ route($currentRoute.'.edit', $content->id) }}"
                                 class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">
                                 <i class="feather icon-edit"></i>
                              </a>
                              <button type="button" value="{{ $content->id }}"
                                      class="confirm-btn btn btn-outline-danger waves-effect waves-light mr-1 mb-1"
                                      data-toggle="modal" data-target="#confirm-modal">
                                 <i class="feather icon-trash-2"></i>
                              </button>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
            </section>

            <x-dashboard.confirm-modal/>
         </div>
      </div>
   </div>
   <!-- END: Content-->

   @push('modal-show')
      <script>
          var currentUrl = window.location.href.replace(/\/*$/gm, '');

          $('.confirm-btn').on('click', function () {
              var id = $(this).attr('value');
              var image = $(this).parent().siblings('.product-img').find('img').attr('src');
              var position = $(this).parent().siblings('.position').html();
              var title = $(this).parent().siblings('.title').html();

              var modal = $('#confirm-modal');
              var modalBody = modal.find('.modal-body');
              modalBody.empty().append('<h4 class="modal-title text-danger">' + title + '<h4/>');
              modalBody.append('<img class="preview" src="' + image + '" width="200px" />');
              modalBody.append('<p class="mt-1 mb-0">Позиция: ' + position + '</p>');

              var form = modal.find('form');
              var action = currentUrl + '/' + id;
              form.attr('action', action);
          });
      </script>
   @endpush
@endsection
