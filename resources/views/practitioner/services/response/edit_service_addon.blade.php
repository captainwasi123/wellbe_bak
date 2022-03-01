<form method="post" action="{{route('practitioner.services.addon.update')}}">
   {{csrf_field()}}
   <input type="hidden" name="addon_id" value="{{base64_encode($addon->id)}}">
   <div class="form-field2">
      <p> ADDON NAME <sup class="col-red">*</sup> </p>
      <input type="text" placeholder="Please enter name" name="addon_name" value="{{$data->name}}" disabled>
   </div>
   @php $aprice = $addon->price == 0 ? $data->addonsDetail[0]->price : $addon->price; @endphp
   <div class="form-field2">
      <p> PRICE <sup class="col-red">*</sup> </p>
      <input type="number" step="any" placeholder="" name="price" id="editAddonPrice" style="padding-left: 50px;" value="{{$aprice}}" required>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      <p> Website Sale Price (Inc GST)</p>
      <input type="number" step="any" style="padding-left: 50px;" id="editAddonSalePrice" value="{{(($aprice/100)*$mtp->gst)+$aprice}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      <p> Your Takehome (After GST and Fees)</p>
      <input type="number" step="any"  style="padding-left: 50px;" id="editAddonTakeHome" value="{{$aprice-(($aprice/100)*$mtp->comission)}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="block-element submit-buttons mob-text-left text-right">
      <button type="reset" class="bg-silver  col-black normal-btn rounded" data-dismiss="modal" aria-label="Close"> Cancel  </button>
      <button type="submit" class="bg-blue col-white normal-btn rounded"> Update </button>
   </div>
</form>