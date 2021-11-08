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
                        @if(empty($val->userCat->id))
                           <div class="cat-box1 disabledService">
                        @else
                           <div class="cat-box1 viewService" data-id="{{base64_encode($val->id)}}">
                        @endif
                        <h5> {{$val->category}}  </h5>
                        @if(!empty($val->userCat->id))
                           <div class="dropdown">
                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <i class="fas fa-ellipsis-v"></i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                 <li><a href="javascript:void(0)" class="disableService" data-id="{{base64_encode($val->id)}}">Disable</a></li>
                              </ul>
                           </div>
                        @endif
                     </div>
                     @endforeach
                  </div>

                  <div class="category-message">
                  <p> Want to offer a new service category? <a href="mailto:info@wellbe.co.nz" class="col-blue"> Contact us to let us know! </a> </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow-x: hidden;overflow-y: scroll;max-height: 600px;" id="service_block">
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

   <div class="modal fade modal-size2 editServiceAddonModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document" style="max-width: 600px;">
         <div class="modal-content">
            <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            <div class="custom-modal-head">
               <h3> Edit Service Addon </h3>
            </div>
            <div class="custom-modal-data" id="editServiceAddonModalBody">
               
            </div>
         </div>
      </div>
   </div>


@endsection

@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/practitioner.js"> </script>
@endsection