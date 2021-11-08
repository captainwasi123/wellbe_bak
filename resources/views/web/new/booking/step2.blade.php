@extends('web.new.includes.master')
@section('title', 'Booking Details')
@section('content')
@php $totalAmount = 0; @endphp

<section class="pad-top-40 pad-bot-40 bg-pink">
   <div class="container">
      <div class="breadcrumb-custom2 m-b-40">
         <a href="javascript:void(0)" data-toggle="modal" data-target=".editBookingModal"> <i class="fa fa-angle-left"> </i> Booking Details </a>
      </div>
      <div class="block-element">
         <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 sec-wid-left">
               <div class="booking-details-wrapper m-b-30">
                  <div class="booking-details-person">
                     <img src="{{URL::to('/')}}/{{$user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                     <h5> {{$user->first_name.' '.$user->last_name}} </h5>
                     <p> 
                        <a href="javascript:void(0)" class="viewUserProfile" data-id="{{base64_encode($user->id)}}"> View Profile </a> 
                        <b class="col-grey font-thin"> 
                           <i class="fa fa-star col-yellow"> </i> 
                           {{empty($user->avgRating) ? '0.0' : $user->avgRating[0]->aggregate}}
                        </b> 
                     </p>
                  </div>
                  <div class="booking-details-item">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/booking-icon1.jpg"> Date & Time </h6>
                     <h5> {{date('D, M-d', strtotime(Session::get('cart.booking.date')))}} - {{Session::get('cart.booking.time')}} </h5>
                  </div>
                  <div class="booking-details-item">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/booking-icon2.jpg"> Location </h6>
                     <h5> {{Session::get('cart.location.place')}} </h5>
                  </div>
                   <div class="book-summary-instructions m-b-10">
                     <h6> Booking Instructions </h6>
                     <p>{{empty(Session::get('cart.booking.instruction')) ? '-' : Session::get('cart.booking.instruction')}}</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sec-wid-right">
               <div class="summary-box2">
                  <div class="book-summary-head">
                     <h3 class="text-center"> Summary  </h3>
                  </div>
                  <div class="book-summary-item">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/map-icon1.jpg"> {{Session::get('cart.location.place')}}  </h6>
                  </div>
                  @if(Session::get('cart') !== null)
                     @foreach(Session::get('cart.services') as $val)

                        <div class="book-summary-item">
                           <h5>{{$val['quantity']}}x {{$val['title']}} </h5>
                           <p> <b class="col-green"> 
                           {{--  From ${{number_format($val['price'], 2)}}  --}}
                            </b> {{$val['duration']}} minutes </p>
                        </div>
                        @php $totalAmount = $totalAmount+($val['price']*$val['quantity']); @endphp
                     @endforeach
                     @if(count(Session::get('cart')) == 0)
                        <h4>No Items Found.</h4>
                     @endif
                  @else
                     <h4>No Items Found.</h4>
                  @endif
                  <div class="book-summary-instructions m-b-10">
                     <a data-toggle="modal" data-target=".addInstructionModal"><h6> {{empty(Session::get('cart.booking.instruction')) ? 'Add' : 'Edit'}} Instructions </h6></a>
                  </div>
                  <div class="book-summary-instructions">
                     <h6> Total <b> ${{number_format($totalAmount, 2)}} + GST </b> </h6>
                  </div>
                  <div class="block-element">
                     <div class="row m-t-20 m-b-10">
                        <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
                           <a href="{{route('booker.order')}}" class="submit-btn1 block-element1"> Pay Now </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



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

<div class="modal popup-1 fade addInstructionModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content">
         <div class="rounded-1 bg-white  ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="card-form block-element">
               <div class="block-element card-form-head m-b-20">
                  <h3 class="text-left"> {{empty(Session::get('cart.booking.instruction')) ? 'Add' : 'Edit'}} Instructions  </h3>
               </div>
               <div class="block-element">
                  <form method="post" action="{{route('treatments.booking.instruction')}}">
                     @csrf
                     <div class="row">
                        <div class="col-12">
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Instructions  </p>
                              <textarea placeholder="Add a note for your therapist, e.g. special requirements or parking instructions..." class="form-control1" name="instructions" required>{{Session::get('cart.booking.instruction')}}</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row m-t-30 m-b-10">
                        <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
                           <button class="submit-btn1 block-element1"> Save </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

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

@endsection