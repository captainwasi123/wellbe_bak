
   <div class="form-field2">
      <p> ADDON NAME <sup class="col-red">*</sup> </p>
      <input type="text" placeholder="Please enter name" name="addon_name" value="{{$data->name}}" disabled>
   </div>
   @php $aprice = $addon->price == 0 ? $data->addonsDetail[0]->price : $addon->price; @endphp
   <div class="form-field2">
      <p> PRICE <sup class="col-red">*</sup> </p>
      <input type="number" step="any" placeholder="" name="price" id="editAddonPrice" style="padding-left: 50px;" value="{{number_format((float)$aprice, 2, '.', '')}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      @php $saleprice = (($aprice/100)*$mtp->gst)+$aprice; @endphp
      <p> Website Sale Price (Inc GST)</p>
      <input type="number" step="any" style="padding-left: 50px;" id="editAddonSalePrice" value="{{number_format((float)$saleprice, 2, '.', '')}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>
   <div class="form-field2">
      @php $homeprice = $aprice-(($aprice/100)*$mtp->comission); @endphp
      <p> Your Takehome (After GST and Fees)</p>
      <input type="number" step="any"  style="padding-left: 50px;" id="editAddonTakeHome" value="{{number_format((float)$homeprice, 2, '.', '')}}" disabled>
      <span class="static-tag1 col-black"> NZ$  </span>
   </div>