<div class="form-body">
   <div class="phone-list-container row">
      @php
         $i = 0;
         $valuesOfPhone = old('contacts.phone') ?? [];
         $numOfPhones = count($valuesOfPhone);

         do {
      @endphp
      <div class="list-item-container col-6 mt-0 mb-2">
         @error('contacts.phone')
         <p class="text-danger mb-1">{{ $message }}</p>
         @enderror
         <div class="form-label-group list-item mb-0">
            <input name="contacts[phone][{{ $i }}]" value="{{ old("contacts.phone.$i") }}"
                   class="form-control @error("contacts.phone.$i") is-invalid @enderror" id="phone"
                   placeholder="{{ __('Phone') }}" type="text" autofocus>
            <i class="feather icon-plus-circle text-primary pl-1 add-list-item"
               onclick="addListItem(this)"></i>
            <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
               onclick="removeListItem(this)"></i>
            <label for="phone">{{ __('Phone') }}</label>
         </div>
         @error("contacts.phone.$i")
         <p class="text-danger mb-1">{{ $message }}</p>
         @enderror
      </div>
      @php
         ++$i;
         } while ($i < $numOfPhones);
      @endphp
   </div>

   <hr class="mb-2">

   <div class="email-list-container row mb-2">
      @error('contacts.email')
      <p class="text-danger mb-1">{{ $message }}</p>
      @enderror
      @php
         $i = 0;
         $valuesOfEmail = old('contacts.email') ?? [];
         $numOfEmails = count($valuesOfEmail);

            do {
      @endphp
      <div class="list-item-container col-6 mt-0 mb-1">
         <div class="form-label-group list-item mb-0">
            <input name="contacts[email][{{ $i }}]" value="{{ old("contacts.email.$i") }}"
                   id="email"
                   class="form-control @error("contacts.email.$i") is-invalid @enderror"
                   placeholder="{{ __('Email') }}" type="email">
            <i class="feather icon-plus-circle text-primary pl-1 add-list-item"
               onclick="addListItem(this)"></i>
            <i class="feather icon-trash-2 text-danger pl-1 remove-list-item"
               onclick="removeListItem(this)"></i>
            <label for="email">{{ __('Email') }}</label>
         </div>
         @error("contacts.email.$i")
         <p class="text-danger mb-1">{{ $message }}</p>
         @enderror
      </div>
      @php
         ++$i;
         } while ($i < $numOfEmails);
      @endphp
   </div>

   <div class="row">
      <div class="col-6">
         <div class="form-label-group">
            <textarea name="contacts[address]" id="address"
                      class="form-control @error('contacts.address') is-invalid @enderror"
                      placeholder="{{ __('Address') }}"
                      type="text">{{ old('contacts.address') }}</textarea>
            <label for="address">{{ __('Address') }}</label>
            @error('contacts.address')
            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
            @enderror
         </div>
      </div>

      @php $i = 0; @endphp
      <div class="col-6">
         <label for="telegram">Telegram</label>
         <div class="input-group mb-75">
            <div class="input-group-prepend">
               <span class="input-group-text fa fa-telegram"></span>
            </div>
            <input name="contacts[social_media][{{ $i }}][url]" type="text"
                   value="{{ old("contacts.social_media.$i.url") }}"
                   class="form-control @error("contacts.social_media.$i.url") is-invalid @enderror" id="telegram"
                   placeholder="https://t.me/username">
            <input type="hidden" name="contacts[social_media][{{ $i }}][name]" value="telegram">
            @error("contacts.social_media.$i.url")
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-6 mt-1">
         <fieldset class="form-label-group">
            <textarea name="contacts[google_map]"
                      class="form-control @error('contacts.google_map') is-invalid @enderror"
                      id="google-map" rows="7"
                      placeholder="Google Map"
                      spellcheck="false">{{ old('contacts.google_map') }}</textarea>
            <label for="google-map">Google Map</label>
            @error('contacts.google_map')
            <p class="text-danger pt-1 mb-0">{{ $message }}</p>
            @enderror
         </fieldset>
      </div>

      <div class="col-6" style="transform: translateY(-16px);">
         @php ++$i; @endphp
         <label for="facebook">Facebook</label>
         <div class="input-group mb-75">
            <div class="input-group-prepend">
               <span class="input-group-text fa fa-facebook"></span>
            </div>
            <input name="contacts[social_media][{{ $i }}][url]" type="text"
                   value="{{ old("contacts.social_media.$i.url") }}"
                   class="form-control @error("contacts.social_media.$i.url") is-invalid @enderror" id="facebook"
                   placeholder="https://www.facebook.com">
            <input type="hidden" name="contacts[social_media][{{ $i }}][name]" value="facebook">
            @error("contacts.social_media.$i.url")
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @php ++$i; @endphp
         <label for="instagram">Instagram</label>
         <div class="input-group mb-75">
            <div class="input-group-prepend">
               <span class="input-group-text fa fa-instagram"></span>
            </div>
            <input name="contacts[social_media][{{ $i }}][url]" type="text"
                   value="{{ old("contacts.social_media.$i.url") }}"
                   class="form-control @error("contacts.social_media.$i.url") is-invalid @enderror" id="instagram"
                   placeholder="https://www.instagram.com">
            <input type="hidden" name="contacts[social_media][{{ $i }}][name]" value="instagram">
            @error("contacts.social_media.$i.url")
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @php ++$i; @endphp
         <label for="linkedin">Linkedin</label>
         <div class="input-group mb-75">
            <div class="input-group-prepend">
               <span class="input-group-text fa fa-linkedin"></span>
            </div>
            <input name="contacts[social_media][{{ $i }}][url]" type="text"
                   value="{{ old("contacts.social_media.$i.url") }}"
                   class="form-control @error("contacts.social_media.$i.url") is-invalid @enderror" id="linkedin"
                   placeholder="https://www.linkedin.com">
            <input type="hidden" name="contacts[social_media][{{ $i }}][name]" value="linkedin">
            @error("contacts.social_media.$i.url")
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-12" style="display: flex; justify-content: flex-end;">
         <button type="submit" class="btn btn-primary mr-1 mb-1">{{ __('Save') }}</button>
         <button type="reset" class="btn btn-outline-warning mb-1">{{ __('Reset') }}</button>
      </div>
   </div>
</div>

@push('company-contacts-list-manipulation')
   <script>
       function addListItem(obj) {
           var listItemPhone = `<div class="list-item-container col-6 mt-0 mb-2">
                  <div class="form-label-group list-item mb-0">
                    <input name="contacts[phone][]" value="" id="phone" class="form-control" placeholder="{{ __('Phone') }}" type="text">
                    <i class="feather icon-plus-circle text-primary pl-1 add-list-item" onclick="addListItem(this)"></i>
                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item" onclick="removeListItem(this)"></i>
                    <label for="phone">{{ __('Phone') }}</label>
                  </div>
                </div>`;

           var listItemEmail = `<div class="list-item-container col-6 mt-0 mb-2">
                  <div class="form-label-group list-item mb-0">
                    <input name="contacts[email][]" value="" id="email" class="form-control" placeholder="{{ __('Email') }}" type="email">
                    <i class="feather icon-plus-circle text-primary pl-1 add-list-item" onclick="addListItem(this)"></i>
                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item" onclick="removeListItem(this)"></i>
                    <label for="email">{{ __('Email') }}</label>
                  </div>
                </div>`;

           var listItemType = $(obj).siblings('input').attr('id');
           var listItem = (listItemType === 'phone') ? listItemPhone : listItemEmail;
           $(obj).parents('.' + listItemType + '-list-container').append(listItem);
       }

       function removeListItem(obj) {
           $(obj).parents('.list-item-container').remove();
       }
   </script>
@endpush