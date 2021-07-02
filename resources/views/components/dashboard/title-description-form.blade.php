@props(['availableLangs', 'lists'])

@error('list')
<p class="text-danger">{{ $message }}</p>
@enderror
<div class="row text-form-container">
   @foreach($lists as $i => $list)
      <div class="col-6 text-form-template" id="{{ $i }}">
         <x-dashboard.language-tabs :availableLangs="$availableLangs" :hasMultiValuedInput="true" :key="$i"/>
         <div class="remove-content-container">
            <i class="feather icon-trash-2 text-danger pr-1 remove-content" onclick="removeTextForm(this)"></i>
         </div>
         <div class="tab-content col-12 p-0 pt-2">
            @foreach($availableLangs as $lang)
               <div class="tab-pane @if($loop->first) active @endif tab-pane-{{$lang}}"
                    id="{{ $lang }}-just" role="tabpanel"
                    aria-labelledby="{{ $lang }}-tab-justified">
                  <div class="form-label-group">
                     <input name="list[{{ $i }}][{{ $lang }}][title]"
                            value="{{ $list[$lang]['title'] }}"
                            type="text" id="title-{{ $i }}-{{ $lang }}"
                            class="form-control @error("list.$i.$lang.title") is-invalid @enderror"
                            placeholder="{{ __('Title') . ' ('. $lang . ')' }}">
                     <label for="title-{{ $i }}-{{ $lang }}">{{ __('Title') . ' ('. $lang . ')' }}</label>
                     @error("list.$i.$lang.title")
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <fieldset class="form-label-group">
                     <textarea name="list[{{ $i }}][{{ $lang }}][description]"
                               class="form-control @error("list.$i.$lang.description") is-invalid @enderror"
                               id="description-{{ $i }}-{{ $lang }}"
                               placeholder="{{ __('Description') }} ({{ $lang }})"
                               spellcheck="false">{{ $list[$lang]['description'] }}</textarea>
                     <label for="description-{{ $i }}-{{ $lang }}">
                        {{ __('Description') }} ({{ $lang }})
                     </label>
                     @error("list.$i.$lang.description")
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </fieldset>
               </div>
            @endforeach
         </div>
      </div>
   @endforeach
</div>
