@extends('web.new.includes.master')
@section('title', 'Select Professional')
@section('content')


<style type="text/css">
  input[type="radio"]{
     display: none;
  }
  input:checked + .book-time-btn {
  color: white;
   background: #5D4E6D;
}
</style>
<section class="pad-top-40 pad-bot-40 bg-pink">
   <div class="container">
      <div class="breadcrumb-custom2 m-b-40">
         <a data-toggle="modal" data-target=".editBookingModal"> <i class="fa fa-angle-left"> </i> Select professional </a>
      </div>
      <div class="block-element">
         <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
               <div class="booking-details-wrapper m-b-30" style="background:#fcfcfc !important">
                  <div class="calendar-booking">
                     <div class="calendar-booking-head">
                        <h3> Schedule </h3>
                     </div>
                     <div class="calendar-book">
                        <div class="date-picker">
                           <div class="input">
                              <div class="result">Select Date:<span></span></div>
                              <button><i class="fa fa-calendar"></i></button>
                           </div>
                           <div class="calendar"></div>
                        </div>
                     </div>
                  </div>
                     <div id="professionalBlock">
                     <div class="bookings-trigger">
                        <ul class="nav nav-tabs no-border" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"> Anytime </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> Morning </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " data-toggle="tab" href="#tabs-3" role="tab"> Afternoon </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " data-toggle="tab" href="#tabs-4" role="tab"> Evening </a>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                           <div class="all-bookings">
                              @foreach($users as $val)
                                 <div class="booking-practices">
                                    <div class="booking-details-person">
                                       <img src="{{URL::to('/')}}/{{$val->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                                       <h5> {{$val->first_name.' '.$val->last_name}} </h5>
                                       <p> 
                                          <a href="javascript:void(0)" class="viewUserProfile" data-id="{{base64_encode($val->id)}}"> View Profile </a> 

                                          <b class="col-grey font-thin"> 
                                             <i class="fa fa-star col-yellow"> </i> 
                                             {{empty($val->avgRating) ? '0.0' : $val->avgRating[0]->aggregate}} 
                                          </b> 
                                       </p>
                                    </div>
                                    <div class="booking-persons-time">
                                       @foreach($val->availability as $avail)
                                          @if(ucfirst($avail->week_day) == $day)
                                             @foreach($avail->slots as $slot)
                                             <input type="radio" id="myCheck{{$slot->id}}" name="stickman[]" value="Body Fitness" tabindex="-1"> 
                                             <label class="book-time-btn"  for="myCheck{{$slot->id}}" >{{date('h:i A', strtotime($slot->start_booking))}} </label>                        
                                             @endforeach
                                          @endif
                                       @endforeach
                                    </div>
                                    <button class="book-now-btn1"> <i class="fa fa-angle-right"> </i> </button>
                                 </div>
                              @endforeach
                           </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                           <div class="empty-bookings">
                              <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
                              <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
                              <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
                           </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                           <div class="empty-bookings">
                              <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
                              <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
                              <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
                           </div>
                        </div>
                        <div class="tab-pane" id="tabs-4" role="tabpanel">
                           <div class="empty-bookings">
                              <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
                              <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
                              <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
               <div class="summary-box2" style="background:#fcfcfc !important">
                  <div class="book-summary-head">
                     <h3 class="text-center"> Summary  </h3>
                  </div>
                  <div class="book-summary-item">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/map-icon1.jpg"> {{Session::get('cart.location.place')}} </h6>
                  </div>
                  @if(Session::get('cart') !== null)
                     @foreach(Session::get('cart.services') as $val)

                        <div class="book-summary-item">
                           <h5>{{$val['quantity']}}x {{$val['title']}} </h5>
                           <p> <b class="col-green"> From ${{number_format($val['price'], 2)}} </b> {{$val['duration']}} minutes </p>
                        </div>
                     @endforeach
                     @if(count(Session::get('cart')) == 0)
                        <h4>No Items Found.</h4>
                     @endif
                  @else
                     <h4>No Items Found.</h4>
                  @endif
                  <div class="booking-details-item m-t-20">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/booking-icon1.jpg"> Date & Time </h6>
                     <h5> {{$date}} - 08:00 AM </h5>
                  </div>
                  <div class="book-summary-instructions m-t-50">
                     <h6> Total <b> $0.00 </b> </h6>
                  </div>
                  <div class="block-element">
                     <div class="row m-t-20 m-b-10">
                        <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
                           <button class="submit-btn1 block-element1" style="padding-left: 0px;padding-right: 0px;"> Continue to Checkout </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<div class="modal popup-1 fade editBookingModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 550px;">
      <div class="modal-content">
         <div class="rounded-1 bg-white  ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="card-form block-element text-center">
               <div class="block-element card-form-head m-b-20 m-t-10">
                  <h2 class="text-left"> Are you sure?  </h2>
                  <p class="text-left"> This will take you back to edit your booking details </p>
               </div>
               <div class="block-element">
                  <div class="row m-b-10">
                     <div class="col-md-12">
                        <p>   <a href="javascript:history.back()" class="custom-anchor1 text-center" style="min-width: 230px;"> Edit My Booking </a> </p>
                        <p>  <a data-dismiss="modal" aria-label="Close" class="custom-anchor2 text-center no-border" style="min-width: 230px;"> <b> Cancel </b> </a> </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal popup-1 fade userProfileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
         <div class="rounded-1 bg-white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="feder-profile" id="userProfileModalBody">
               
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('addScript')
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
@endsection