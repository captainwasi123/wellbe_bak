@extends('includes.master')
@section('title', 'Your Services')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')
     
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
               <div class="box-type3 height-custom1" style="overflow:visible;" style="position: relative;">
                  <div class="cat-head">
                     <h5 class="col-black"> Category ({{count($data['category'])}}) </h5>
                  </div>
                  <div class="all-categories">
                     @foreach($data['category'] as $val)
                     <div class="cat-box1 viewService" data-id="{{base64_encode($val->id)}}">
                        <h5> {{$val->category}}  </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="javascript:void(0)" class="addService" data-id="{{base64_encode($val->id)}}">Add Services</a></li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                  </div>

                  <div class="category-message">
                  <p> Want to offer a new service category? <a href="#" class="col-blue"> Contact us to let us know! </a> </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow:visible;" id="service_block">
                  <div class="cat-head">
                     <h5 class="col-black"> Services</h5>
                     <div class="action-buttons"> </div>
                  </div>
                  <div class="all-categories">
                     <h5>Select category to see.</h5>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow: visible;" id="service_detail_block">
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