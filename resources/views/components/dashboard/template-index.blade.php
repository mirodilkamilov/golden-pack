@props(['contents'])

@php
   $currentRoute = Route::currentRouteName();
   $routeName = str_replace('index', '', $currentRoute);
@endphp
<div class="content-body">
   <section id="data-thumb-view" class="data-thumb-view-header">
      <div class="table-responsive">
         <a href="{{ route($routeName.'create') }}" class="btn btn-outline-primary" tabindex="0"
            aria-controls="DataTables_Table_0">
            <span><i class="feather icon-plus"></i> {{ __('Add New') }}</span>
         </a>
         <table class="table data-thumb-view">
            <thead>
            <tr>
               <th>{{ __('Image') }}</th>
               <th>{{ __('Position') }}</th>
               <th>{{ __('Title') }}</th>
               <th>{{__('Description')}}</th>
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
                  <td class="product-name title">{{ $content->title }}</td>
                  <td class="text-center">
                     {!! $content->description !!}
                  </td>
                  <td class="product-action text-center">
                     <a href="{{ route($routeName.'edit', $content->id) }}"
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
              modalBody.empty().append('<h4 class="modal-title text-danger">' + title + '<h5/>');
              modalBody.append('<img class="preview" src="' + image + '" width="200px" />');
              modalBody.append('<p class="mt-1 mb-0">Position: ' + position + '</p>');

              var form = modal.find('form');
              var action = currentUrl + '/' + id;
              form.attr('action', action);
          });

      </script>
   @endpush
</div>