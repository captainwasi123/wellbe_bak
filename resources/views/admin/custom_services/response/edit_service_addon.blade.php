<form method="post" action="{{route('admin.services.addons.update')}}">
   {{csrf_field()}}
   <input type="hidden" name="sa_id" value="{{base64_encode($data->id)}}">
   <div class="row">
      <div class="col-md-8">
            <div class="form-field2">
               <p> VARIANTS/ADD-ON NAME <sup class="col-red">*</sup> </p>
               <input type="text" placeholder="Please enter name" name="addon_name" value="{{$data->name}}" required>
            </div>
      </div>
      <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
         <div class="form-field2">
            <p class="col-black">  Duration (Minutes) </p>
            <input type="hidden" name="did" value="{{base64_encode($data->addonsDetail[0]->id)}}">
            <input type="text" placeholder="Enter duration" name="duration" value="{{$data->addonsDetail[0]->duration}}" required>
         </div>
      </div> 
   </div>
   <div class="row">
      <div class="col-md-12">
         <div id="addon_item_add">
            <div class="row">
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
                  <div class="form-field2">
                     <p class="col-black"> Price   </p>
                     <input type="text" placeholder="Enter price" id="editAddonPrice" name="price" value="{{number_format((float)$data->addonsDetail[0]->price, 2, '.', '')}}" style="padding-left: 50px;" required>
                     <span class="static-tag1 col-black"> NZ$  </span>
                  </div>
               </div> 
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
                  @php $webpr = (($data->addonsDetail[0]->price/100)*$mtp->gst)+$data->addonsDetail[0]->price; @endphp
                  <div class="form-field2">
                     <p class="col-black"> Website Sale Price  </p>
                     <input type="text" placeholder="(Inc GST)" id="editAddonSalePrice" value="{{number_format((float)$webpr, 2, '.', '')}}" style="padding-left: 50px;" disabled>
                     <span class="static-tag1 col-black"> NZ$  </span>
                  </div>
               </div> 
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
                  @php $homepr = $data->addonsDetail[0]->price-(($data->addonsDetail[0]->price/100)*$mtp->comission); @endphp
                  <div class="form-field2">
                     <p class="col-black"> Your Takehome </p>
                     <input type="text" placeholder="(After GST and Fees)" value="{{number_format((float)$homepr, 2, '.', '')}}" id="editAddonTakeHome" style="padding-left: 50px;" disabled>
                     <span class="static-tag1 col-black"> NZ$  </span>
                  </div>
               </div>  
            </div>
         </div>
      </div>
   </div>

   <div class="block-element submit-buttons mob-text-left text-right">
      <button type="button" class="bg-silver  col-black normal-btn rounded" data-dismiss="modal" aria-label="Close"> Cancel  </button>
      <button class="bg-blue col-white normal-btn rounded"> Add </button>
   </div>
</form>