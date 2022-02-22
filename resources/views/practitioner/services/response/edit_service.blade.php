<form method="post" action="{{route('practitioner.services.update')}}">
   {{csrf_field()}}
   <input type="hidden" name="service_id" value="{{base64_encode($service->id)}}">
   <div class="form-field2">
      <p> SERVICE NAME <sup class="col-red">*</sup> </p>
      <input type="text" placeholder="Please enter name" name="service_name" value="{{$data->name}}" disabled>
   </div>
   <div class="form-field2">
      <p> SERVICE DURATION (IN MINUTES) <sup class="col-red">*</sup> </p>
      <input type="number" placeholder="0" name="duration" value="{{$data->duration}}" disabled>
   </div>
   @php $pr = empty($service->price) ? $data->price : $service->price; @endphp
   <div class="form-field2">
      <p> PRICE (EXCL GST) <sup class="col-red">*</sup> </p>
      <input type="number" step="any" placeholder="" name="price" id="editServicePrice" style="padding-left: 50px;" value="{{$pr}}">
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      <p> WEBSITE SALE PRICE (INC GST) <sup class="col-red">*</sup> </p>
      <input type="number" step="any" placeholder="" id="editServiceSalePrice" style="padding-left: 50px;" value="{{(($pr/100)*$mtp->gst)+$pr}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      <p> YOUR TAKEHOME (AFTER GST & FEES) <sup class="col-red">*</sup> </p>
      <input type="number" step="any" placeholder="" id="editServiceTakehomePrice" style="padding-left: 50px;" value="{{$pr-(($pr/100)*$mtp->comission)}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      <p> DESCRIPTION </p>
      <textarea placeholder="Please enter description" rows="2" name="description" disabled>{{$data->description}}</textarea>
   </div>
   <div class="form-field2">
      <p>PREPRATION </p>
      <textarea placeholder="Please enter description" name="long_description" disabled>{{$data->long_description}}</textarea>
   </div>

   <div class="block-element submit-buttons mob-text-left text-right">
      <button type="reset" class="bg-silver  col-black normal-btn rounded" data-dismiss="modal" aria-label="Close"> Cancel  </button>
      <button type="submit" class="bg-blue col-white normal-btn rounded"> Update </button>
   </div>
</form>