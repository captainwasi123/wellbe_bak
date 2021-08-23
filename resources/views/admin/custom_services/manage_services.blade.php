@extends('includes.master')
@section('title', 'Custom Services')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Your Services </h3>
      </div>
      <!-- <div class="block-element cat-buttons mob-text-left m-t-20 pad-1">
         <button class="normal-btn2 bg-blue col-white"> Approved </button>
         <button class="normal-btn2 bg-white col-black"> Pending </button>
         <button class="normal-btn2 bg-white col-black"> Rejected </button>
      </div> -->
      <div class=""></div>
      <div class="block-element pad-1 m-t-20">
         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow-x: hidden;overflow-y: scroll;max-height: 600px;" id="service_block"><div class="cat-head">
			   <h5 class="col-black"> Services (0) </h5>
			   <div class="action-buttons"> <a href="javascript:void()" class="fa fa-plus addService" data-id="{{$cat_id}}"></a> </div>
			</div>
			<div class="all-categories">
			            <h5>No Services Available.</h5>
			   </div>
			</div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow-x: hidden;overflow-y: scroll;max-height: 600px;" id="service_detail_block">
                  <div class="cat-head">
                     <h5 class="col-black"> Services Details </h5>
                  </div>
                  <div class="manicure-text">
                     <h5>Select service to see.</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
  </div>


  <!-- Add Service -->
  <div class="modal fade modal-size2 addServiceModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document" style="max-width: 600px;">
         <div class="modal-content">
            <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            <div class="custom-modal-head">
               <h3> Add Services </h3>
            </div>
            <div class="custom-modal-data">
               <form method="post" action="{{route('practitioner.services.add')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="cat_id" id="cat_id">
                  <div class="form-field2">
                     <p> SERVICE NAME <sup class="col-red">*</sup> </p>
                     <input type="text" placeholder="Please enter name" name="service_name" required="">
                  </div>
                  <div class="form-field2">
                     <p> SERVICE DURATION (IN MINUTES) <sup class="col-red">*</sup> </p>
                     <input type="number" placeholder="0" name="duration" required="">
                  </div>
                  <div class="form-field2">
                     <p> PRICE <sup class="col-red">*</sup> </p>
                     <input type="number" step="any" placeholder="" name="price" style="padding-left: 50px;">
                     <span class="static-tag1 col-black"> NZ$  </span>
                  </div>
                  <div class="form-field2">
                     <p> DESCRIPTION </p>
                     <textarea placeholder="Please enter description" rows="2" name="description"></textarea>
                  </div>
                  <div class="form-field2">
                     <p>LONG DESCRIPTION </p>
                     <textarea placeholder="Please enter description" name="long_description"></textarea>
                  </div>

                  <div class="block-element submit-buttons mob-text-left text-right">
                     <button type="reset" class="bg-silver  col-black normal-btn rounded" data-dismiss="modal" aria-label="Close"> Cancel  </button>
                     <button type="submit" class="bg-blue col-white normal-btn rounded"> Add </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

  <!-- Edit Service -->
  <div class="modal fade modal-size2 editServiceModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document" style="max-width: 600px;">
         <div class="modal-content">
            <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            <div class="custom-modal-head">
               <h3> Edit Service </h3>
            </div>
            <div class="custom-modal-data" id="editServiceModalBody">
               
            </div>
         </div>
      </div>
   </div>

   <!-- Add Service Addons -->
   <div class="modal fade modal-size2 addAddonModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document" style="max-width: 600px;">
         <div class="modal-content">
            <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            <div class="custom-modal-head">
               <h3> Add Variant </h3>
            </div>
            <div class="custom-modal-data">
               <form method="post" action="{{route('practitioner.services.addons.add')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="service_id" id="service_id">
                  <div class="form-field2">
                     <p> VARIANTS/ADD-ON NAME <sup class="col-red">*</sup> </p>
                     <input type="text" placeholder="Please enter name" name="addon_name">
                  </div>

                  <div id="addon_item_add">
                     <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
                           <div class="form-field2">
                              <p class="col-black">  Duration (Minutes) </p>
                              <input type="text" placeholder="Enter type" name="duration[]" required>
                           </div>
                        </div> 
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> 
                           <div class="form-field2">
                              <p class="col-black"> Price   </p>
                              <input type="text" placeholder="Enter price" name="price[]" style="padding-left: 50px;" required>
                              <span class="static-tag1 col-black"> NZ$  </span>
                           </div>
                        </div>   
                     </div>
                  </div>

                  <div class="block-element m-b-20">
                  <a href="javascript:void(0)" class="col-blue addItemAddons"> Add more</a>
                  </div>


                  <div class="block-element submit-buttons mob-text-left text-right">
                     <button type="button" class="bg-silver  col-black normal-btn rounded" data-dismiss="modal" aria-label="Close"> Cancel  </button>
                     <button class="bg-blue col-white normal-btn rounded"> Add </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/practitioner.js"> </script>
@endsection