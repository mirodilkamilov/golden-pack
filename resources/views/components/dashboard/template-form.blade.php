@props(['availableLangs', 'positions', 'content' => null])

@php
   $currentRoute = Route::currentRouteName();
   $isTestimonialsRoute = $currentRoute === 'testimonials.create' || $currentRoute === 'testimonials.edit';
@endphp

<div class="row">
   <div class="tab-content pt-2 col-md-6 col-6 pr-0 pl-0">
      @foreach($availableLangs as $lang)
         <div class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
              id="{{ $lang }}-just" role="tabpanel"
              aria-labelledby="{{ $lang }}-tab-justified">
            <div class="col-md-12 col-12">
               <div class="form-label-group">
                  <input name="title[{{ $lang }}]"
                         value="{{ old("title.$lang") ?? $content?->title[$lang] }}"
                         type="text"
                         id="title-{{$loop->iteration}}"
                         class="form-control @error("title.$lang") is-invalid @enderror"
                         placeholder="{{ ($isTestimonialsRoute ? __('Title of person') : __('Title')) . ' ('. $lang . ')' }}">
                  <label
                     for="title-{{$loop->iteration}}">{{ ($isTestimonialsRoute ? __('Title of person') : __('Title')) . ' ('. $lang . ')' }}
                  </label>
                  @error("title.$lang")
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
            </div>
            <div class="col-lg-12 col-md-12">
               <fieldset class="form-label-group">
                  <textarea name="description[{{ $lang }}]"
                            class="form-control @error("description.$lang") is-invalid @enderror"
                            id="description-{{ $lang }}"
                            placeholder="{{ __('Description') }} ({{ $lang }})"
                            spellcheck="false">{{ old("description.$lang") ?? $content?->description[$lang] }}</textarea>
                  <label for="description-{{ $lang }}">{{ __('Description') }} ({{ $lang }})</label>
                  @error("description.$lang")
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
               </fieldset>
            </div>
         </div>
      @endforeach
   </div>

   @php $currentRoute = Route::currentRouteName() @endphp
   <div class="col-lg-6 col-md-6"
        style="transform: {{ ($currentRoute==='testimonials.create' || $currentRoute==='testimonials.edit')  ? 'translateY(-102px);' : 'translateY(-50px);' }}">
      <div class="form-label-group mb-1">
         <input name="position" type="number" id="position"
                class="form-control @error('position') is-invalid @enderror"
                placeholder="{{ __('Position') }}"
                value="{{ old('position') ?? $content?->position }}">
         <label for="position">{{ __('Position') }}</label>
         @error('position')
         <p class="text-danger mb-0">{{ $message }}</p>
         @enderror
         <x-dashboard.available-positions :positions="$positions"/>
         @if(isset($content))
            <input type="hidden" name="ignored_position" value="{{ $content->position }}">
         @endif
      </div>
      <fieldset class="form-group">
         <label for="basicInputFile">{{ __('Image') }}</label>
         <div class="custom-file">
            <input name="image" type="file"
                   class="custom-file-input @error('image') is-invalid @enderror"
                   id="image"
                   onchange="setPreview(this)">
            <label class="custom-file-label" for="image">{{ __('Choose image') }}</label>
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </fieldset>
      <fieldset class="form-group"
                style="display: flex; justify-content: center; align-items: center;">
         <img src="#" class="preview" alt="preview">
         @if(isset($content?->image))
            <img src="{{ $content->image }}" class="placeholder" alt="placeholder" style="width: 300px;">
         @endif
      </fieldset>
   </div>
</div>
<div class="col-12 mt-1 p-0" style="display: flex; justify-content: flex-end;">
   <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
      {{ __('Save') }}
   </button>
   <button type="reset"
           class="btn btn-outline-warning mb-1 waves-effect waves-light">
      {{ __('Reset') }}
   </button>
</div>

@push('ckeditor')
   <script>
       for (let lang of avilableLangs) {
           ClassicEditor
               .create(document.querySelector('#description-' + lang), {
                   toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
               })
               .catch(error => {
                   console.error(error);
               });
       }
   </script>
@endpush