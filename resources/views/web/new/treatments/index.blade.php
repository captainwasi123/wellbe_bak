@extends('web.new.includes.master')
@section('title', 'Treatments')
@section('content')
@php $totalPrice = 0; @endphp
 <!-- Page Content Section Starts Here -->
   <section class="bg-pink pad-top-40 pad-bot-40">
      <div class="container">
         <div class="sec-head6">
            <h3> Choose Threatment Category </h3>
            <p> With an ever growing list of services on offer, we’re always looking out for new talent. </p>
         </div>
      </div>
   </section>
   <!-- Page Content Section Starts Here -->
   <!-- Page Content Section Starts Here -->
   <section class="pad-top-40 pad-bot-40 bg-blue">
      <div class="container">
         <div class="booking-features">
            @foreach($categories as $key => $val)
               <div class="featurebox-wrapper">
                  <div class="feature-box5 filterCat {{empty($cat_name) && ($key == 0) ? 'active' : ''}} {{!empty($cat_name) && ($cat_name == $val->category) ? 'active' : ''}}" data-val="{{$val->category}}">
                     <img src="{{URL::to($val->image)}}">
                     <h4> {{$val->category}} </h4>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   <!-- Page Content Section Ends Here -->
   <!-- Page Content Section Starts Here -->
   <section class="pad-top-40 pad-bot-40">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-12">
               <div class="row">
                  @foreach($services as $val)
                     <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="service-box5">
                           <h3> {{$val->name}} </h3>
                           <p class="two_line"> 
                              {{$val->description}}
                           </p>
                           <h6> <a href="javascript:void(0)" class="serviceDetails" data-id="{{base64_encode($val->id)}}"> Book Now </a> <span> From {{'$'.number_format($val->price, 2)}} </span> </h6>
                        </div>
                     </div>
                  @endforeach
                  @if(count($services) == 0)
                     <h4>No Services Available</h4>
                  @endif
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-12">
               <div class="summary-box2" style="padding-top: 0px;">
                  <div class="book-summary-head" style="margin-bottom: 10px !important">
                     <h3 class="text-center"> Your Booking  </h3>
                  </div>
                  <div class="book-summary-item">
                     <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/map-icon1.jpg"> {{$place}} </h6>
                  </div>
                  @if(Session::get('cart') !== null)
                     @foreach(Session::get('cart.services') as $val)

                        <div class="book-summary-item">
                           <h5>{{$val['quantity']}}x {{$val['title']}} </h5>
                           <p> <b class="col-green"> From ${{number_format($val['price'], 2)}} </b> {{$val['duration']}} minutes </p>
                           <a href="javascript:void(0)" class="item-edit1 col-red removeItemCart" data-id="{{$val['id']}}"> Remove </a>
                        </div>
                        @php $totalPrice += ($val['price']*$val['quantity']); @endphp
                     @endforeach
                     @if(count(Session::get('cart')) == 0)
                        <h4>No Items Found.</h4>
                     @endif
                  @else
                     <h4>No Items Found.</h4>
                  @endif
                  <div class="block-element m-t-10">
                     <form method="post" action="{{route('treatments.booking.step1')}}">
                        @csrf
                        <input type="hidden" name="lat" value="{{$_GET['lat']}}">
                        <input type="hidden" name="lng" value="{{$_GET['long']}}">
                        <input type="hidden" name="place" value="{{$_GET['value']}}">
                        
                        <button {{(empty(Session::get('cart')) || count(Session::get('cart.services')) == 0) ? 'type=button' : ''}} {{$totalPrice < 25 ? 'type=button' : ''}} class="time-btn1 pro-btn"> Select Time </button>
                     </form>
                  </div>
                  <div class="order-information">
                     <p> Your order must be a minimum of $25 for our mobile treatments </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Page Content Section Ends Here -->



   <div class="modal popup-1 fade serviceDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="max-width: 550px;">
         <div class="modal-content">
            <div class="rounded-1 bg-white  ">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               <div class="card-form block-element" id="serviceDetailsModalBody">
                  
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection