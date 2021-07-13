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
                              class="card-title">{{ isset($content) ? __('Edit') : __('Create') }}</h4>
                        </div>
                        <div class="card-content">
                           <div class="card-body pb-0">
                              <form class="form"
                                    action="{{ isset($content) ? route($currentRoute.'.update', $content->id) : route($currentRoute.'.store') }}"
                                    method="post" enctype="multipart/form-data">
                              @if(isset($content))
                                 @method('PUT')
                              @endif
                              @csrf

                              <!-- Image -->
                                 <div class="col-12 pl-0 pr-0">
                                    <fieldset class="form-group">
                                       <label for="basicInputFile">{{ __('Image') }}</label>
                                       <div class="custom-file">
                                          <input name="image" type="file"
                                                 class="custom-file-input @error('image') is-invalid @enderror"
                                                 id="image"
                                                 onchange="setPreview(this)">
                                          <label class="custom-file-label"
                                                 for="image">{{ __('Choose image') }}</label>
                                          @error('image')
                                          <p class="text-danger">{{ $message }}</p>
                                          @enderror
                                       </div>
                                    </fieldset>
                                    <fieldset class="form-group"
                                              style="display: flex; justify-content: center; align-items: center;">
                                       <img src="#" class="preview" alt="preview">
                                       @if(isset($content?->image))
                                          <img src="{{ $content->image }}" class="placeholder" alt="placeholder"
                                               style="width: 300px;">
                                       @endif
                                    </fieldset>
                                 </div>

                                 @php
                                    $lists = $content->list ?? array(0 => ['ru' => ['title' => '', 'description' => ''],'en' => ['title' => '', 'description' => ''],'uz' => ['title' => '', 'description' => ''],]);

                                    if($errors->hasAny(['list.*.*.title', 'list.*.*.description', 'image']))
                                       $lists = old()['list'];
                                 @endphp
                                 <x-dashboard.title-description-form :availableLangs="$availableLangs" :lists="$lists"/>

                                 <button class="btn btn-success waves-effect waves-light" type="button"
                                         onclick="addTextForm()">{{ __('Add list') }}
                                 </button>
                                 <div class="col-12 mt-1 p-0" style="display: flex; justify-content: flex-end;">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                                       {{ __('Save') }}
                                    </button>
                                    <button type="reset" class="btn btn-outline-warning mb-1 waves-effect waves-light">
                                       {{ __('Reset') }}
                                    </button>
                                 </div>
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


   @push('image-preview')
      <script src="{{ asset('assets/js/image-preview.js') }}"></script>
   @endpush

   @push('change-language-tabs')
      <script src="{{ asset('assets/js/change-language-tabs.js') }}"></script>
   @endpush

   <!-- initializes ckeditor -->
   @push('ckeditor')
      <script>
          var numOfTextForms = $('.text-form-template:last').attr('id');
          ++numOfTextForms;

          for (let i = 0; i <= numOfTextForms; i++) {
              for (let lang of avilableLangs) {
                  ClassicEditor
                      .create(document.querySelector('#description-' + i + '-' + lang), {
                          toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
                      })
                      .catch(error => {
                          console.error(error);
                      });
              }
          }
      </script>
   @endpush

   <!-- adding/deleting text-forms -->
   @push('text-form-manipulation')
      <script>
          function addTextForm() {
              var i = $('.text-form-template:last').attr('id');
              if (isNaN(i))
                  i = 0;
              ++i;

              var formTemplate = `<div class="col-6 text-form-template" id="` + i + `">`;
              var tabComponent = `<ul class="nav nav-tabs language-tabs" id="myTab2" role="tablist">`;

              for (let lang of avilableLangs) {
                  var navItem = `<li class="nav-item">
                                                    <a class="nav-link text-uppercase ` + (lang === 'ru' ? 'active ' : '') + lang + `-tab-justified" onclick="changeLangTabs(this)"
                                                       data-toggle="tab" href="#` + lang + `-just" role="tab" aria-controls="` + lang + `-just"
                                                       aria-selected="true">
                                                       ` + lang + `
                                                    </a>
                                                 </li>`;
                  tabComponent += navItem;
              }
              tabComponent += `</ul>`;
              formTemplate += tabComponent;

              var tabContent = `<div class="remove-content-container">
                                                   <i class="feather icon-trash-2 text-danger pr-1 remove-content" onclick="removeTextForm(this)"></i>
                                                </div>
                                             <div class="tab-content col-12 p-0 pt-2">`;

              for (let lang of avilableLangs) {
                  var tabPane = `<div class="tab-pane  tab-pane-` + lang + ' ' + (lang === 'ru' ? 'active ' : '') + `" id="` + lang + `-just" role="tabpanel" aria-labelledby="` + lang + `-tab-justified">
                                                   <div class="form-label-group">
                                                      <input name="list[` + i + `][` + lang + `][title]" value="" type="text" id="title-` + i + `-` + lang + `" class="form-control " placeholder="Заголовок (` + lang + `)">
                                                      <label for="title-` + i + `-` + lang + `">Заголовок (` + lang + `)</label>
                                                   </div>
                                                   <fieldset class="form-label-group">
                                                      <textarea name="list[` + i + `][` + lang + `][description]" class="form-control " id="description-` + i + `-` + lang + `" placeholder="Описание (` + lang + `)" spellcheck="false"></textarea>
                                                      <label for="description-` + i + `-` + lang + `">
                                                         Описание (` + lang + `)
                                                      </label>
                                                   </fieldset>
                                                </div>`;
                  tabContent += tabPane;
              }
              tabContent += `</div>`;
              formTemplate += tabContent;
              $('.text-form-container').append(formTemplate);
              for (let lang of avilableLangs) {
                  ClassicEditor
                      .create(document.querySelector('#description-' + i + '-' + lang), {
                          toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
                      })
                      .catch(error => {
                          console.error(error);
                      });
              }
          }

          function removeTextForm(obj) {
              $(obj).parents('.text-form-template').remove();
          }
      </script>
   @endpush
@endsection
